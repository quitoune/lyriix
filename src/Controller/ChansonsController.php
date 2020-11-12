<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Chansons Controller
 *
 * @property \App\Model\Table\ChansonsTable $Chansons
 * @method \App\Model\Entity\Chanson[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChansonsController extends AppController
{
    /**
    * Home method
    *
    * @return \Cake\Http\Response|null|void Renders view
    */
    public function home()
    {
        $chansons = $this->Chansons->find('threaded', array(
            'conditions' => array('Chansons.creation >= ' => date("Y-m-d H:i:s", strtotime("-7 days"))),
        ));
        
        $this->set('title', __('Home'));
        
        $this->set(compact('chansons'));
    }
    
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
        $chansons = $this->paginate($this->Chansons);
        
        $this->set('title', __('Songs'));
        
        $this->set(compact('chansons'));
    }

    /**
     * View method
     *
     * @param string $slug Chanson slug.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $chanson = $this->Chansons->find('threaded', array(
            'conditions' => array('slug' => $slug),
            'contain' => ['Createurs', 'ChansonFilms', 'ChansonFilms.Films', 'ChansonShows', 'ChansonShows.Shows', 'Modificateurs', 'Traductions', 'Traductions.Langues'],
        ))->firstOrFail();
        
        $this->set('title', $chanson->titre);
        
        $this->set(compact('chanson'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chanson = $this->Chansons->newEmptyEntity();
        if ($this->request->is('post')) {
            $date = date("Y-m-d H:i:s");
            $data = $this->request->getData();
            $data['creation'] = $date;
            $data['modification'] = $date;
            $data['createur_id'] = 1;
            $data['modificateur_id'] = 1;
            $data['slug'] = $this->createSlug($data['titre']);
            
            $chanson = $this->Chansons->patchEntity($chanson, $data);
            if ($this->Chansons->save($chanson)) {
                $this->Flash->success(__('The chanson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson could not be saved. Please, try again.'));
        }
        
        $this->set('title', __('Add a song'));
        $this->set(compact('chanson'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chanson id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chanson = $this->Chansons->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chanson = $this->Chansons->patchEntity($chanson, $this->request->getData());
            if ($this->Chansons->save($chanson)) {
                $this->Flash->success(__('The chanson has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson could not be saved. Please, try again.'));
        }
        $utilisateurs = $this->Chansons->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('chanson', 'utilisateurs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chanson id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chanson = $this->Chansons->get($id);
        if ($this->Chansons->delete($chanson)) {
            $this->Flash->success(__('The chanson has been deleted.'));
        } else {
            $this->Flash->error(__('The chanson could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
