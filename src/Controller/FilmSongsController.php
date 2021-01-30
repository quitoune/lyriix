<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * FilmSongs Controller
 *
 * @property \App\Model\Table\FilmSongsTable $FilmSongs
 * @method \App\Model\Entity\FilmSong[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmSongsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Songs', 'Films', 'Createurs', 'Modificateurs'],
        ];
        $filmSongs = $this->paginate($this->FilmSongs);
        
        $this->set('title', __('Film-Song'));

        $this->set(compact('filmSongs'));
    }

    /**
     * View method
     *
     * @param string|null $id Song Film id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filmSong = $this->FilmSongs->get($id, [
            'contain' => ['Songs', 'Films', 'Createurs', 'Modificateurs'],
        ]);
        
        $this->set('title', __('Film-Song'));

        $this->set(compact('filmSong'));
    }
    
    /**
     * View method
     *
     * @param string $film_id Film id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function filmView($film_id = null)
    {
        $filmSongs = $this->FilmSongs->find('threaded', array(
            'conditions' => array('film_id' => $film_id),
            'contain' => ['Songs', 'Films', 'Createurs', 'Modificateurs'],
            'order' => ['Films.titre' => 'ASC']
        ));
        
        $this->set(compact('filmSongs'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filmSong = $this->FilmSongs->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            
            $filmSong = $this->FilmSongs->patchEntity($filmSong, $data);
            if ($this->FilmSongs->save($filmSong)) {
                $this->Flash->success(__('The film song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film song could not be saved. Please, try again.'));
        }
        $songs = $this->FilmSongs->Songs->find('threaded', array(
            'contain' => ['FilmSongs.Songs'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        $films = $this->FilmSongs->Films->find('threaded', array(
            'contain' => ['FilmSongs.Films'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Film-Song'));
        $this->set(compact('filmSong', 'songs', 'films'));
    }
    
    /**
     * Add method
     *
     * @param string|null $slug Song slug.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addFilm($slug = null)
    {
        $filmSong = $this->FilmSongs->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->preCreationObjet($this->request->getData());
            
            $filmSong = $this->FilmSongs->patchEntity($filmSong, $data);
            if ($this->FilmSongs->save($filmSong)) {
                $this->Flash->success(__('The film song has been saved.'));
                
                return $this->redirect(['action' => 'view', $slug, 'controller' => 'Songs']);
            }
            $this->Flash->error(__('The film song could not be saved. Please, try again.'));
        }
        $song = $this->FilmSongs->Songs->find('threaded', array(
            'contain' => ['FilmSongs.Songs'],
            'conditions' => ['slug' => $slug]
        ))->firstOrFail();
        
        $films = $this->FilmSongs->Films->find('threaded', array(
            'contain' => ['FilmSongs.Films'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Film-Song'));
        $this->set(compact('filmSong', 'song', 'films'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Song Film id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filmSong = $this->FilmSongs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filmSong = $this->FilmSongs->patchEntity($filmSong, $this->request->getData());
            if ($this->FilmSongs->save($filmSong)) {
                $this->Flash->success(__('The film song has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film song could not be saved. Please, try again.'));
        }
        $songs = $this->FilmSongs->Songs->find('list', ['limit' => 200]);
        $films = $this->FilmSongs->Films->find('list', ['limit' => 200]);
        $users = $this->FilmSongs->Users->find('list', ['limit' => 200]);
        $this->set(compact('filmSong', 'songs', 'films', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Song Film id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filmSong = $this->FilmSongs->get($id);
        if ($this->FilmSongs->delete($filmSong)) {
            $this->Flash->success(__('The film song has been deleted.'));
        } else {
            $this->Flash->error(__('The film song could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
