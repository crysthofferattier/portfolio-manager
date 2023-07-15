<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TransactionsType Controller
 *
 * @property \App\Model\Table\TransactionsTypeTable $TransactionsType
 * @method \App\Model\Entity\TransactionsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsTypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $transactionsType = $this->paginate($this->TransactionsType);

        $this->set(compact('transactionsType'));
    }

    /**
     * View method
     *
     * @param string|null $id Transactions Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transactionsType = $this->TransactionsType->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('transactionsType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transactionsType = $this->TransactionsType->newEmptyEntity();
        if ($this->request->is('post')) {
            $transactionsType = $this->TransactionsType->patchEntity($transactionsType, $this->request->getData());
            if ($this->TransactionsType->save($transactionsType)) {
                $this->Flash->success(__('The transactions type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions type could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transactions Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transactionsType = $this->TransactionsType->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transactionsType = $this->TransactionsType->patchEntity($transactionsType, $this->request->getData());
            if ($this->TransactionsType->save($transactionsType)) {
                $this->Flash->success(__('The transactions type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transactions type could not be saved. Please, try again.'));
        }
        $this->set(compact('transactionsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transactions Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transactionsType = $this->TransactionsType->get($id);
        if ($this->TransactionsType->delete($transactionsType)) {
            $this->Flash->success(__('The transactions type has been deleted.'));
        } else {
            $this->Flash->error(__('The transactions type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
