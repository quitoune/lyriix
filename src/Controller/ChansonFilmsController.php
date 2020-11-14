<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ChansonFilms Controller
 *
 * @property \App\Model\Table\ChansonFilmsTable $ChansonFilms
 * @method \App\Model\Entity\ChansonFilm[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChansonFilmsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chansons', 'Films', 'Createurs', 'Modificateurs'],
        ];
        $chansonFilms = $this->paginate($this->ChansonFilms);
        
        $this->set('title', __('Song-Film'));

        $this->set(compact('chansonFilms'));
    }

    /**
     * View method
     *
     * @param string|null $id Chanson Film id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chansonFilm = $this->ChansonFilms->get($id, [
            'contain' => ['Chansons', 'Films', 'Createurs', 'Modificateurs'],
        ]);
        
        $this->set('title', __('Song-Film'));

        $this->set(compact('chansonFilm'));
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
        $chansonFilms = $this->ChansonFilms->find('threaded', array(
            'conditions' => array('film_id' => $film_id),
            'contain' => ['Chansons', 'Films', 'Createurs', 'Modificateurs'],
            'order' => ['Films.titre' => 'ASC']
        ));
        
        $this->set(compact('chansonFilms'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chansonFilm = $this->ChansonFilms->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            
            $chansonFilm = $this->ChansonFilms->patchEntity($chansonFilm, $data);
            if ($this->ChansonFilms->save($chansonFilm)) {
                $this->Flash->success(__('The chanson film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson film could not be saved. Please, try again.'));
        }
        $chansons = $this->ChansonFilms->Chansons->find('threaded', array(
            'contain' => ['ChansonFilms.Chansons'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        $films = $this->ChansonFilms->Films->find('threaded', array(
            'contain' => ['ChansonFilms.Films'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Song-Film'));
        $this->set(compact('chansonFilm', 'chansons', 'films'));
    }
    
    /**
     * Add method
     *
     * @param string|null $slug Chanson slug.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function addFilm($slug = null)
    {
        $chansonFilm = $this->ChansonFilms->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->preCreationObjet($this->request->getData());
            
            $chansonFilm = $this->ChansonFilms->patchEntity($chansonFilm, $data);
            if ($this->ChansonFilms->save($chansonFilm)) {
                $this->Flash->success(__('The chanson film has been saved.'));
                
                return $this->redirect(['action' => 'view', $slug, 'controller' => 'Chansons']);
            }
            $this->Flash->error(__('The chanson film could not be saved. Please, try again.'));
        }
        $chanson = $this->ChansonFilms->Chansons->find('threaded', array(
            'contain' => ['ChansonFilms.Chansons'],
            'conditions' => ['slug' => $slug]
        ))->firstOrFail();
        
        $films = $this->ChansonFilms->Films->find('threaded', array(
            'contain' => ['ChansonFilms.Films'],
            'limit' => 200,
            'order' => array('titre' => 'ASC')
        ));
        
        $this->set('title', __('Add Song-Film'));
        $this->set(compact('chansonFilm', 'chanson', 'films'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chanson Film id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chansonFilm = $this->ChansonFilms->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chansonFilm = $this->ChansonFilms->patchEntity($chansonFilm, $this->request->getData());
            if ($this->ChansonFilms->save($chansonFilm)) {
                $this->Flash->success(__('The chanson film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson film could not be saved. Please, try again.'));
        }
        $chansons = $this->ChansonFilms->Chansons->find('list', ['limit' => 200]);
        $films = $this->ChansonFilms->Films->find('list', ['limit' => 200]);
        $users = $this->ChansonFilms->Users->find('list', ['limit' => 200]);
        $this->set(compact('chansonFilm', 'chansons', 'films', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chanson Film id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chansonFilm = $this->ChansonFilms->get($id);
        if ($this->ChansonFilms->delete($chansonFilm)) {
            $this->Flash->success(__('The chanson film has been deleted.'));
        } else {
            $this->Flash->error(__('The chanson film could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
