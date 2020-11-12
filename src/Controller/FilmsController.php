<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Films Controller
 *
 * @property \App\Model\Table\FilmsTable $Films
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilmsController extends AppController
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
        $films = $this->paginate($this->Films);
        
        $this->set('title', __('Films'));

        $this->set(compact('films'));
    }

    /**
     * View method
     *
     * @param string|null $slug Film slug.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $film = $this->Films->find('all', array(
            'conditions' => array('slug' => $slug),
            'contain' => ['Createurs', 'Modificateurs', 'ChansonFilms', 'ChansonFilms.Chansons'],
        ))->firstOrFail();
        
        $this->set('title', $film->titre);
        
        $this->set(compact('film'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $film = $this->Films->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            $data['slug'] = $this->createSlug($data['titre']);
            
            $film = $this->Films->patchEntity($film, $data);
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a film'));
        $this->set(compact('film'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $film = $this->Films->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $film = $this->Films->patchEntity($film, $this->request->getData());
            if ($this->Films->save($film)) {
                $this->Flash->success(__('The film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The film could not be saved. Please, try again.'));
        }
        $utilisateurs = $this->Films->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('film', 'utilisateurs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Film id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $film = $this->Films->get($id);
        if ($this->Films->delete($film)) {
            $this->Flash->success(__('The film has been deleted.'));
        } else {
            $this->Flash->error(__('The film could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
