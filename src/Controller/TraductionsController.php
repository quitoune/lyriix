<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Traductions Controller
 *
 * @property \App\Model\Table\TraductionsTable $Traductions
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TraductionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chansons', 'Langues', 'Createurs', 'Modificateurs'],
        ];
        $traductions = $this->paginate($this->Traductions);
        
        $this->set('title', __('Translations'));

        $this->set(compact('traductions'));
    }

    /**
     * View method
     *
     * @param string|null $id Traduction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $traduction = $this->Traductions->get($id, [
            'contain' => ['Chansons', 'Langues', 'Createurs', 'Modificateurs'],
        ]);
        
        $this->set('title', __('Translation - ID ') . $traduction->id);

        $this->set(compact('traduction'));
    }
    
    /**
     * View method
     *
     * @param string|null $langue_id Langue id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function langueView($langue_id = null)
    {
        $traductions = $this->Traductions->find('threaded', array(
            'conditions' => array('langue_id' => $langue_id),
            'contain' => ['Chansons', 'Langues', 'Createurs', 'Modificateurs'],
        ));
        
        $this->set(compact('traductions'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $traduction = $this->Traductions->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            
            $traduction = $this->Traductions->patchEntity($traduction, $data);
            if ($this->Traductions->save($traduction)) {
                $this->Flash->success(__('The traduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traduction could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a translation'));
        $chansons = $this->Traductions->Chansons->find('threaded', array(
            'contain' => ['Traductions.Chansons'],
            'limit' => 200, 
            'order' => array('titre' => 'ASC')
        ));
        $langues = $this->Traductions->Langues->find('threaded', array(
            'contain' => ['Traductions.Langues'],
            'limit' => 200, 
            'order' => array('nom' => 'ASC')
        ));
        $this->set(compact('traduction', 'chansons', 'langues'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Traduction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $traduction = $this->Traductions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $traduction = $this->Traductions->patchEntity($traduction, $this->request->getData());
            if ($this->Traductions->save($traduction)) {
                $this->Flash->success(__('The traduction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The traduction could not be saved. Please, try again.'));
        }
        $chansons = $this->Traductions->Chansons->find('list', ['limit' => 200]);
        $langues = $this->Traductions->Langues->find('list', ['limit' => 200]);
        $utilisateurs = $this->Traductions->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('traduction', 'chansons', 'langues', 'utilisateurs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Traduction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $traduction = $this->Traductions->get($id);
        if ($this->Traductions->delete($traduction)) {
            $this->Flash->success(__('The traduction has been deleted.'));
        } else {
            $this->Flash->error(__('The traduction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
