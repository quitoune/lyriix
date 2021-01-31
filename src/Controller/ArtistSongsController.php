<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ArtistSongs Controller
 *
 * @property \App\Model\Table\ArtistSongsTable $ArtistSongs
 * @method \App\Model\Entity\ArtistSong[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArtistSongsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Artists', 'Songs'],
        ];
        $artistSongs = $this->paginate($this->ArtistSongs);
        
        $this->set('title', __('Artist-Song'));
        
        $this->set(compact('artistSongs'));
    }

    /**
     * View method
     *
     * @param string|null $id Artist Song id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $artistSong = $this->ArtistSongs->get($id, [
            'contain' => ['Artists', 'Songs'],
        ]);
        
        $this->set('title', __('Artist-Song'));

        $this->set(compact('artistSong'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $artistSong = $this->ArtistSongs->newEmptyEntity();
        if ($this->request->is('post')) {
            $artistSong = $this->ArtistSongs->patchEntity($artistSong, $this->request->getData());
            if ($this->ArtistSongs->save($artistSong)) {
                $this->Flash->success(__('The artist song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist song could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add Artist-Song'));
        $all_artists = $this->ArtistSongs->Artists->find('threaded', array(
            'contain' => ['ArtistSongs.Artists'],
            'order' => array('nom' => 'ASC')
        ));
        $all_songs = $this->ArtistSongs->Songs->find('threaded', array(
            'contain' => ['ArtistSongs.Songs'],
            'order' => array('titre' => 'ASC')
        ));
        $songs = array();
        foreach ($all_songs as $song){
            $songs[$song->id] = $song->titre;
        }
        $artists = array();
        foreach ($all_artists as $artist){
            $artists [$artist->id] = $artist->nom;
        }
        $this->set(compact('artistSong', 'artists', 'songs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Artist Song id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $artistSong = $this->ArtistSongs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $artistSong = $this->ArtistSongs->patchEntity($artistSong, $this->request->getData());
            if ($this->ArtistSongs->save($artistSong)) {
                $this->Flash->success(__('The artist song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The artist song could not be saved. Please, try again.'));
        }
        $artists = $this->ArtistSongs->Artists->find('list', ['limit' => 200]);
        $songs = $this->ArtistSongs->Songs->find('list', ['limit' => 200]);
        $this->set(compact('artistSong', 'artists', 'songs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Artist Song id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $artistSong = $this->ArtistSongs->get($id);
        if ($this->ArtistSongs->delete($artistSong)) {
            $this->Flash->success(__('The artist song has been deleted.'));
        } else {
            $this->Flash->error(__('The artist song could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
