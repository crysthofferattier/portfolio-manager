<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InvestmentsType Controller
 *
 * @property \App\Model\Table\InvestmentsTypeTable $InvestmentsType
 * @method \App\Model\Entity\InvestmentsType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvestmentsTypeController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $investmentsType = $this->paginate($this->InvestmentsType);

        $this->set(compact('investmentsType'));
    }

    /**
     * View method
     *
     * @param string|null $id Investments Type id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $investmentsType = $this->InvestmentsType->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('investmentsType'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $investmentsType = $this->InvestmentsType->newEmptyEntity();
        if ($this->request->is('post')) {
            $investmentsType = $this->InvestmentsType->patchEntity($investmentsType, $this->request->getData());
            if ($this->InvestmentsType->save($investmentsType)) {
                $this->Flash->success(__('The investments type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The investments type could not be saved. Please, try again.'));
        }
        $this->set(compact('investmentsType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Investments Type id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $investmentsType = $this->InvestmentsType->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $investmentsType = $this->InvestmentsType->patchEntity($investmentsType, $this->request->getData());
            if ($this->InvestmentsType->save($investmentsType)) {
                $this->Flash->success(__('The investments type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The investments type could not be saved. Please, try again.'));
        }
        $this->set(compact('investmentsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Investments Type id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $investmentsType = $this->InvestmentsType->get($id);
        if ($this->InvestmentsType->delete($investmentsType)) {
            $this->Flash->success(__('The investments type has been deleted.'));
        } else {
            $this->Flash->error(__('The investments type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
