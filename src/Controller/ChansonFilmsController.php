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
            $chansonFilm = $this->ChansonFilms->patchEntity($chansonFilm, $this->request->getData());
            if ($this->ChansonFilms->save($chansonFilm)) {
                $this->Flash->success(__('The chanson film has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chanson film could not be saved. Please, try again.'));
        }
        $chansons = $this->ChansonFilms->Chansons->find('list', ['limit' => 200]);
        $films = $this->ChansonFilms->Films->find('list', ['limit' => 200]);
        $utilisateurs = $this->ChansonFilms->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('chansonFilm', 'chansons', 'films', 'utilisateurs'));
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
        $utilisateurs = $this->ChansonFilms->Utilisateurs->find('list', ['limit' => 200]);
        $this->set(compact('chansonFilm', 'chansons', 'films', 'utilisateurs'));
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
