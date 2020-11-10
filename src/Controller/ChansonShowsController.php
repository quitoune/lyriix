<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ChansonShows Controller
 *
 * @property \App\Model\Table\ChansonShowsTable $ChansonShows
 * @method \App\Model\Entity\ChansonShow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChansonShowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chansons', 'Shows', 'Createurs', 'Modificateurs'],
        ];
        $chansonShows = $this->paginate($this->ChansonShows);

        $this->set(compact('chansonShows'));
    }

    /**
     * View method
     *
     * @param string|null $id Chanson Show id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chansonShow = $this->ChansonShows->get($id, [
            'contain' => ['Chansons', 'Shows', 'Createurs', 'Modificateurs'],
        ]);

        $this->set(compact('chansonShow'));
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
        $chansonShows = $this->ChansonShows->find('threaded', array(
            'conditions' => array('show_id' => $show_id),
            'contain' => ['Chansons', 'Shows', 'Createurs', 'Modificateurs'],
            'order' => ['episode' => 'ASC']
        ));
        
        $this->set(compact('chansonShows'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chansonShow = $this->ChansonShows->newEmptyEntity();
        if ($this->request->is('post')) {
            $chansonShow = $this->ChansonShows->patchEntity($chansonShow, $this->request->getData());
            if ($this->ChansonShows->save($chansonShow)) {
                $this->Flash->success(__('The chanson show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson show could not be saved. Please, try again.'));
        }
        $chansons = $this->ChansonShows->Chansons->find('list', ['limit' => 200]);
        $shows = $this->ChansonShows->Shows->find('list', ['limit' => 200]);
        $utilisateurs = $this->ChansonShows->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('chansonShow', 'chansons', 'shows', 'utilisateurs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chanson Show id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chansonShow = $this->ChansonShows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chansonShow = $this->ChansonShows->patchEntity($chansonShow, $this->request->getData());
            if ($this->ChansonShows->save($chansonShow)) {
                $this->Flash->success(__('The chanson show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson show could not be saved. Please, try again.'));
        }
        $chansons = $this->ChansonShows->Chansons->find('list', ['limit' => 200]);
        $shows = $this->ChansonShows->Shows->find('list', ['limit' => 200]);
        $utilisateurs = $this->ChansonShows->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('chansonShow', 'chansons', 'shows', 'utilisateurs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chanson Show id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chansonShow = $this->ChansonShows->get($id);
        if ($this->ChansonShows->delete($chansonShow)) {
            $this->Flash->success(__('The chanson show has been deleted.'));
        } else {
            $this->Flash->error(__('The chanson show could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
