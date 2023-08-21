<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Dividend;
use Cake\View\JsonView;

/**
 * Dividends Controller
 *
 * @property \App\Model\Table\DividendsTable $Dividends
 * @method \App\Model\Entity\Dividend[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DividendsController extends AppController
{
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
        $dividends = $this->Dividends->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ]
            ]);

        $this->set(compact('dividends'));
    }

    /**
     * View method
     *
     * @param string|null $id Dividend id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dividend = $this->Dividends->get($id, [
            'contain' => ['Assets'],
        ]);

        $dividend->date = $this->DateFormat
            ->convertDateToPtBR($dividend->date->toDateString());

        $this->set(compact('dividend'));
        $this->viewBuilder()->setOption('serialize', ['dividend']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $dividend = $this->Dividends->newEntity($this->request->getData());
        $this->Authorization->authorize($dividend);

        $dividend->date = $this->DateFormat
            ->convertDate($this->request->getData('date'));

        $dividend->user_id = $this->Authentication->getIdentity()->id;
        if ($this->Dividends->save($dividend)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message
        ]);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dividend id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);

        $dividend = $this->Dividends->get($id);
        $dividend = $this->Dividends->patchEntity($dividend, $this->request->getData());

        $dividend->date = $this->DateFormat
            ->convertDate($this->request->getData('date'));

        if ($this->Dividends->save($dividend)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message
        ]);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dividend id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['delete']);
        $dividend = $this->Dividends->get($id);

        $message = 'Deleted';

        if (!$this->Dividends->delete($dividend)) {
            $message = 'Error';
        }

        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function getTotalDividendsPerType()
    {
        $this->Authorization->skipAuthorization();

        $fiis = $this->Dividends->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ],
                'Users'
            ])
            ->where([
                'AssetsType.id' => '1',
                'Users.id' => $this->Authentication->getIdentity()->id
            ]);

        $stocks = $this->Dividends->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ],
                'Users'
            ])
            ->where([
                'AssetsType.id' => '2',
                'Users.id' => $this->Authentication->getIdentity()->id
            ]);

        $total = $this->Dividends->find()
            ->sumOf('value');



        $this->set(compact('stocks', 'fiis', 'total'));
    }

    public function monthlyDividends()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->Dividends->find();
        $monthlyDividends = $query->select([
            'label' => 'MONTHNAME(date)',
            'y' => $query->func()->sum('value')
        ])->contain([
            'Users'
        ])->where([
            'Users.id' => $this->Authentication->getIdentity()->id
        ])->group('MONTHNAME(date)')
            ->order('FIELD(label,"January","February","March", "June", "July","August","September","October","November","December")');

        $this->set(compact('monthlyDividends'));
    }

    public function monthlyDividendsPerType()
    {
        // $user = $this->UserInfo->getUserInfo();

        // $user = $this->Authentication->getIdentity();
        // print_r($user->id);
        // exit();
        $this->Authorization->skipAuthorization();

        $query = $this->Dividends->find();
        $monthlyDividendsPerType = $query->select([
            'label' => 'MONTHNAME(date)',
            'y' => $query->func()->sum('value'),
            'type_id' => 'AssetsType.id'
        ])->contain([
            'Assets' => [
                'AssetsType'
            ],
            'Users'
        ])->where([
            'Users.id' => $this->Authentication->getIdentity()->id
        ])->group([
            'MONTHNAME(date)',
            'AssetsType.id'
        ])->order('FIELD(label,"January","February","March", "June", "July","August","September","October","November","December")');

        $this->set(compact('monthlyDividendsPerType'));
    }
}
