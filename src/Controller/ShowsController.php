<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Shows Controller
 *
 * @property \App\Model\Table\ShowsTable $Shows
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ShowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Createurs', 'Modificateurs'],
        ];
        $shows = $this->paginate($this->Shows);
        
        $this->set('title', __('Shows'));

        $this->set(compact('shows'));
    }

    /**
     * View method
     *
     * @param string|null $slug Show slug.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $show = $this->Shows->find('all', array(
            'conditions' => array('slug' => $slug),
            'contain' => ['Createurs', 'Modificateurs', 'ShowSongs'],
        ))->firstOrFail();
        
        
        $this->set('title', $show->titre);
        
        $this->set(compact('show'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $show = $this->Shows->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            $data['slug'] = $this->createSlug($data['titre']);
            
            $show = $this->Shows->patchEntity($show, $data);
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a show'));
        $this->set(compact('show'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $show = $this->Shows->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $show = $this->Shows->patchEntity($show, $this->request->getData());
            if ($this->Shows->save($show)) {
                $this->Flash->success(__('The show has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The show could not be saved. Please, try again.'));
        }
        $users = $this->Shows->Users->find('list', ['limit' => 200]);
        $this->set(compact('show', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Show id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $show = $this->Shows->get($id);
        if ($this->Shows->delete($show)) {
            $this->Flash->success(__('The show has been deleted.'));
        } else {
            $this->Flash->error(__('The show could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
