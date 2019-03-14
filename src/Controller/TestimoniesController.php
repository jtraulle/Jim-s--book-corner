<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Testimonies Controller
 *
 * @property \App\Model\Table\TestimoniesTable $Testimonies
 *
 * @method \App\Model\Entity\Testimony[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestimoniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
            'limit' => 5
        ];
        $testimonies = $this->paginate($this->Testimonies);

        $this->set(compact('testimonies'));
    }

    /**
     * View method
     *
     * @param string|null $id Testimony id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testimony = $this->Testimonies->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('testimony', $testimony);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testimony = $this->Testimonies->newEntity();
        if ($this->request->is('post')) {
            $testimony = $this->Testimonies->patchEntity($testimony, $this->request->getData());
            if ($this->Testimonies->save($testimony)) {
                $this->Flash->success(__('The testimony has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimony could not be saved. Please, try again.'));
        }
        $users = $this->Testimonies->Users->find('list', ['limit' => 200]);
        $this->set(compact('testimony', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Testimony id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testimony = $this->Testimonies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testimony = $this->Testimonies->patchEntity($testimony, $this->request->getData());
            if ($this->Testimonies->save($testimony)) {
                $this->Flash->success(__('The testimony has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The testimony could not be saved. Please, try again.'));
        }
        $users = $this->Testimonies->Users->find('list', ['limit' => 200]);
        $this->set(compact('testimony', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Testimony id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testimony = $this->Testimonies->get($id);
        if ($this->Testimonies->delete($testimony)) {
            $this->Flash->success(__('The testimony has been deleted.'));
        } else {
            $this->Flash->error(__('The testimony could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
