<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ShowSongs Controller
 *
 * @property \App\Model\Table\ShowSongsTable $ShowSongs
 * @method \App\Model\Entity\ShowSong[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowSongsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Songs', 'Shows', 'Createurs', 'Modificateurs'],
        ];
        $showSongs = $this->paginate($this->ShowSongs);
        
        $this->set('title', __('Show-Song'));

        $this->set(compact('showSongs'));
    }

    /**
     * View method
     *
     * @param string|null $id Show Song id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $showSong = $this->ShowSongs->get($id, [
            'contain' => ['Songs', 'Shows', 'Createurs', 'Modificateurs'],
        ]);
        
        $this->set('title', __('Show-Song'));

        $this->set(compact('showSong'));
    }
    
    /**
     * View method
     *
     * @param string $show_id Show id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function showView($show_id = null)
    {
        $showSongs = $this->ShowSongs->find('threaded', array(
            'conditions' => array('show_id' => $show_id),
            'contain' => ['Songs', 'Shows', 'Createurs', 'Modificateurs'],
            'order' => ['saison' => 'ASC', 'episode' => 'ASC']
        ));
        
        $this->set('title', __('Show-Song'));
        
        $this->set(compact('showSongs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showSong = $this->ShowSongs->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->preCreationObjet($this->request->getData());
            
            $showSong = $this->ShowSongs->patchEntity($showSong, $data);
            if ($this->ShowSongs->save($showSong)) {
                $this->Flash->success(__('The show song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show song could not be saved. Please, try again.'));
        }
        $songs = $this->ShowSongs->Songs->find('threaded', array(
            'contain' => ['ShowSongs.Songs'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        $shows = $this->ShowSongs->Shows->find('threaded', array(
            'contain' => ['ShowSongs.Shows'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Show-Song'));
        $this->set(compact('showSong', 'songs', 'shows'));
    }    
    
    /**
    * Add method
    *
    * @param string|null $slug Song slug.
    * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
    */
    public function addShow($slug = null)
    {
        $showSong = $this->ShowSongs->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->preCreationObjet($this->request->getData());
            $data['episode'] = "S" . intval($data['saison']). "E" . (intval($data["episode"]) < 10 ? "0" . intval($data["episode"]) : intval($data["episode"]));
            
            $showSong = $this->ShowSongs->patchEntity($showSong, $data);
            if ($this->ShowSongs->save($showSong)) {
                $this->Flash->success(__('The song show has been saved.'));
                
                return $this->redirect(['action' => 'view', $slug, 'controller' => 'Songs']);
            }
            $this->Flash->error(__('The song show could not be saved. Please, try again.'));
        }
        $song = $this->ShowSongs->Songs->find('threaded', array(
            'contain' => ['ShowSongs.Songs'],
            'conditions' => ['slug' => $slug]
        ))->firstOrFail();
        
        $shows = $this->ShowSongs->Shows->find('threaded', array(
            'contain' => ['ShowSongs.Shows'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Show-Song'));
        $this->set(compact('showSong', 'song', 'shows'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Show Song id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $showSong = $this->ShowSongs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $showSong = $this->ShowSongs->patchEntity($showSong, $this->request->getData());
            if ($this->ShowSongs->save($showSong)) {
                $this->Flash->success(__('The show song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show song could not be saved. Please, try again.'));
        }
        $songs = $this->ShowSongs->Songs->find('list', ['limit' => 200]);
        $shows = $this->ShowSongs->Shows->find('list', ['limit' => 200]);
        $users = $this->ShowSongs->Users->find('list', ['limit' => 200]);
        $this->set(compact('showSong', 'songs', 'shows', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Show Song id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $showSong = $this->ShowSongs->get($id);
        if ($this->ShowSongs->delete($showSong)) {
            $this->Flash->success(__('The show song has been deleted.'));
        } else {
            $this->Flash->error(__('The show song could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
