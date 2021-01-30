<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Translations Controller
 *
 * @property \App\Model\Table\TranslationsTable $Translations
 * @method \App\Model\Entity\Translation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TranslationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Songs', 'Languages', 'Createurs', 'Modificateurs'],
        ];
        $translations = $this->paginate($this->Translations);
        
        $this->set('title', __('Translations'));

        $this->set(compact('translations'));
    }

    /**
     * View method
     *
     * @param string|null $id Translation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $translation = $this->Translations->get($id, [
            'contain' => ['Songs', 'Languages', 'Createurs', 'Modificateurs'],
        ]);
        
        $this->set('title', __('Translation - ID ') . $translation->id);

        $this->set(compact('translation'));
    }
    
    /**
     * View method
     *
     * @param string|null $language_id Language id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function languageView($language_id = null)
    {
        $translations = $this->Translations->find('threaded', array(
            'conditions' => array('language_id' => $language_id),
            'contain' => ['Songs', 'Languages', 'Createurs', 'Modificateurs'],
        ));
        
        $this->set(compact('translations'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $translation = $this->Translations->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            
            $translation = $this->Translations->patchEntity($translation, $data);
            if ($this->Translations->save($translation)) {
                $this->Flash->success(__('The translation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The translation could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a translation'));
        $songs = $this->Translations->Songs->find('threaded', array(
            'contain' => ['Translations.Songs'],
            'limit' => 200, 
            'order' => array('titre' => 'ASC')
        ));
        $languages = $this->Translations->Languages->find('threaded', array(
            'contain' => ['Translations.Languages'],
            'limit' => 200, 
            'order' => array('nom' => 'ASC')
        ));
        $this->set(compact('translation', 'songs', 'languages'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Translation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $translation = $this->Translations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $translation = $this->Translations->patchEntity($translation, $this->request->getData());
            if ($this->Translations->save($translation)) {
                $this->Flash->success(__('The translation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The translation could not be saved. Please, try again.'));
        }
        $songs = $this->Translations->Songs->find('list', ['limit' => 200]);
        $languages = $this->Translations->Languages->find('list', ['limit' => 200]);
        $users = $this->Translations->Users->find('list', ['limit' => 200]);
        $this->set(compact('translation', 'songs', 'languages', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Translation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $translation = $this->Translations->get($id);
        if ($this->Translations->delete($translation)) {
            $this->Flash->success(__('The translation has been deleted.'));
        } else {
            $this->Flash->error(__('The translation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
