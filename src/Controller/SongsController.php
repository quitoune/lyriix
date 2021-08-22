<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

/**
 * Songs Controller
 *
 * @property \App\Model\Table\SongsTable $Songs
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SongsController extends AppController
{
    /**
    * Home method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
    public function home()
    {
        $songs = $this->Songs->find('threaded', array(
            'conditions' => array('Songs.creation >= ' => date("Y-m-d H:i:s", strtotime("-7 days"))),
        ));
        
        $this->set('title', __('Home'));
        
        $this->set(compact('songs'));
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ArtistSongs', 'ArtistSongs.Artists', 'Createurs', 'Modificateurs'],
            'order' => ['id' => 'DESC']
        ];
        $songs = $this->paginate($this->Songs);
        
        $this->set('title', __('Songs'));
        $artists = array();
        
        foreach($songs as $song){
            $artists[$song->id] = array('featuring' => array(), 'main' => array());
            foreach($song->artist_songs as $artist_song){
                if($artist_song->featuring){
                    $artists[$song->id]['featuring'][] = '<a href="' . Router::url(['controller' => 'Artists', 'action' => 'view', $artist_song->artist->slug]) . '">' . $artist_song->artist->nom . '</a>';
                } else {
                    $artists[$song->id]['main'][] = '<a href="' . Router::url(['controller' => 'Artists', 'action' => 'view', $artist_song->artist->slug]) . '">' . $artist_song->artist->nom . '</a>';
                }
            }
        }
        
        $this->set(compact('songs', 'artists'));
    }

    /**
     * View method
     *
     * @param string $slug Song slug.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $song = $this->Songs->find('threaded', array(
            'conditions' => array('slug' => $slug),
            'contain' => ['ArtistSongs', 'ArtistSongs.Artists', 'Createurs', 'FilmSongs', 'FilmSongs.Films', 'ShowSongs', 'ShowSongs.Shows', 'Modificateurs', 'Translations', 'Translations.Languages'],
        ))->firstOrFail();
        
        $this->set('title', $song->titre);
        
        $artists = array('featuring' => array(), 'main' => array());
        foreach($song->artist_songs as $artist_song){
            if($artist_song->featuring){
                $artists['featuring'][] = '<a href="' . Router::url(['controller' => 'Artists', 'action' => 'view', $artist_song->artist->slug]) . '">' . $artist_song->artist->nom . '</a>';
            } else {
                $artists['main'][] = '<a href="' . Router::url(['controller' => 'Artists', 'action' => 'view', $artist_song->artist->slug]) . '">' . $artist_song->artist->nom . '</a>';
            }
        }
        
        $this->set(compact('song', 'artists'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $song = $this->Songs->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->preCreationObjet($this->request->getData());
            if ($this->Songs->addPost($data)) {
                $this->Flash->success(__('The song has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The song could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a song'));
        $all_artists = $this->Songs->ArtistSongs->Artists->find('threaded', array(
            'order' => array('nom' => 'ASC')
        ));
        
        
        $artists = array();
        foreach ($all_artists as $artist){
            $artists [$artist->id] = $artist->nom;
        }
        
        $opt = array(
            'main' => array(
                'id' => 'artists-main',
                'name' => 'artists_main[]',
                'classe' => 'select-multiple',
                'label' => __('Main artists'),
                'multiple' => true
            ),
            'featuring' => array(
                'id' => 'artists-featuring',
                'name' => 'artists_featuring[]',
                'classe' => 'select-multiple',
                'label' => __('Featuring artists'),
                'multiple' => true
            )
        );
        
        $this->set(compact('song', 'artists', 'opt'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Song id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $song = $this->Songs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->updateModification($this->request->getData());
            $song = $this->Songs->patchEntity($song, $data, [
                'accessibleFields' => ['createur_id' => false]
            ]);
            if ($this->Songs->save($song)) {
                $this->Flash->success(__('The song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The song could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Edit a song'));
        $this->set(compact('song'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Song id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $song = $this->Songs->get($id);
        if ($this->Songs->delete($song)) {
            $this->Flash->success(__('The song has been deleted.'));
        } else {
            $this->Flash->error(__('The song could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        if (in_array($action, ['add', 'edit'])) {
            return true;
        }
        
        // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }
        
        return false;
    }
}
