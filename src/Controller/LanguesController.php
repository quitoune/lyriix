<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Langues Controller
 *
 * @property \App\Model\Table\LanguesTable $Langues
 * @method \App\Model\Entity\Langue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LanguesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $langues = $this->paginate($this->Langues);
        
        $this->set('title', __('Languages'));

        $this->set(compact('langues'));
    }

    /**
     * View method
     *
     * @param string|null $code Langue code.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($code = null)
    {
        $langue = $this->Langues->find('threaded', array(
            'conditions' => array('code' => $code),
            'contain' => ['Traductions', 'Traductions.Chansons'],
        ))->firstOrFail();
        
        $this->set('title', $langue->code);
        
        $this->set(compact('langue'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $langue = $this->Langues->newEmptyEntity();
        if ($this->request->is('post')) {
            $langue = $this->Langues->patchEntity($langue, $this->request->getData());
            if ($this->Langues->save($langue)) {
                $this->Flash->success(__('The langue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The langue could not be saved. Please, try again.'));
        }
        $this->set(compact('langue'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Langue id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $langue = $this->Langues->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $langue = $this->Langues->patchEntity($langue, $this->request->getData());
            if ($this->Langues->save($langue)) {
                $this->Flash->success(__('The langue has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The langue could not be saved. Please, try again.'));
        }
        $this->set(compact('langue'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Langue id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $langue = $this->Langues->get($id);
        if ($this->Langues->delete($langue)) {
            $this->Flash->success(__('The langue has been deleted.'));
        } else {
            $this->Flash->error(__('The langue could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
