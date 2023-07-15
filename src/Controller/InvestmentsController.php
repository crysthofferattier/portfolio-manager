<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Investment;
use Cake\View\JsonView;

/**
 * Investments Controller
 *
 * @method \App\Model\Entity\Investment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvestmentsController extends AppController
{
    public function initialize(): void
    {
        $this->loadComponent('DateFormat');
    }

    public function viewClasses(): array
    {
        return [JsonView::class];
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $investments = $this-> Investments->find('all')
            ->order(['trade_date' => 'DESC'])
            ->contain('InvestmentsType');

        $this->set(compact('investments'));
    }

    /**
     * View method
     *
     * @param string|null $id Investment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $investment = $this->Investments->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('investment'));
        $this->viewBuilder()->setOption('serialize', ['investment']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $investment = $this->Investments->newEntity($this->request->getData());

        $investment->trade_date = $this->DateFormat
            ->convertDate($this->request->getData('trade_date'));

        if ($this->Investments->save($investment)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'investment' => $investment
        ]);
        $this->viewBuilder()->setOption('serialize', ['investment', 'message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Investment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $investment = $this->Investments->get($id, [
        //     'contain' => [],
        // ]);
        // if ($this->request->is(['patch', 'post', 'put'])) {
        //     $investment = $this->Investments->patchEntity($investment, $this->request->getData());
        //     if ($this->Investments->save($investment)) {
        //         $this->Flash->success(__('The investment has been saved.'));

        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('The investment could not be saved. Please, try again.'));
        // }
        // $this->set(compact('investment'));

        $this->request->allowMethod(['patch', 'post', 'put']);
        $investment = $this->Investments->get($id);
        $investment = $this->Investments->patchEntity($investment, $this->request->getData());

        if ($this->Investments->save($investment)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }

        $this->set([
            'message' => $message,
            'investment' => $investment
        ]);

        $this->viewBuilder()->setOption('serialize', ['investment', 'message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Investment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $investment = $this->Investments->get($id);
        $message = 'Deleted';

        if (!$this->Investments->delete($investment)) {
            $message = 'Error';
        }

        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
