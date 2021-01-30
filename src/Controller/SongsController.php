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
            'contain' => ['ArtistSongs', 'ArtistSongs.Artists'],
            'order' => ['id' => 'DESC']
        ];
        $songs = $this->paginate($this->Songs);
        
        $this->set('title', __('Songs'));
        
        $this->set(compact('songs'));
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
            $data['slug'] = $this->createSlug($data['titre']);
            
            $song = $this->Songs->patchEntity($song, $data);
            if ($this->Songs->save($song)) {
                $this->Flash->success(__('The song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The song could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a song'));
        $this->set(compact('song'));
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
            $data = $this->preCreationObjet($this->request->getData());
            $song = $this->Songs->patchEntity($song, $data, [
                'accessibleFields' => ['createur_id' => false]
            ]);
            if ($this->Songs->save($song)) {
                $this->Flash->success(__('The song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The song could not be saved. Please, try again.'));
        }
        $users = $this->Songs->Users->find('list', ['limit' => 200]);
        $this->set(compact('song', 'users'));
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
        // Les actions 'add' et 'tags' sont toujours autorisés pour les user
        // authentifiés sur l'application
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
