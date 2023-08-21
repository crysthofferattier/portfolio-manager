<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

use function PHPSTORM_META\type;

/**
 * Transactions Controller
 *
 * @property \App\Model\Table\TransactionsTable $Transactions
 * @method \App\Model\Entity\Transaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransactionsController extends AppController
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
        $this->Authorization->skipAuthorization();

        $transactions = $this->Transactions->find('all')
            ->contain([
                'Assets' => [
                    'AssetsType'
                ],
                'Users'
            ])->where([
                'Users.id' => $this->Authentication->getIdentity()->id
            ])->order(['trade_date' => 'DESC']);

        $this->set(compact('transactions'));
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
        $transaction = $this->Transactions->get($id, [
            'contain' => [
                'Assets' => [
                    'AssetsType'
                ]
            ],
        ]);

        // $transaction->trade_date = $this->DateFormat
        //     ->convertDateToPtBR($transaction->trade_date->toDateString());

        $this->set(compact('transaction'));
        $this->viewBuilder()->setOption('serialize', ['transaction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $transaction = $this->Transactions->newEntity($this->request->getData());
        $this->Authorization->authorize($transaction);

        // $transaction->trade_da$this->Authentication->getIdentity()->id;te = $this->DateFormat
        //     ->convertDate($this->request->getData('trade_date'));

        $transaction->user_id = $this->Authentication->getIdentity()->id;

        if ($this->Transactions->save($transaction)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'transaction' => $transaction
        ]);
        $this->viewBuilder()->setOption('serialize', ['transaction', 'message']);
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
        $this->request->allowMethod(['patch', 'post', 'put']);
        $transaction = $this->Transactions->get($id);
        $transaction = $this->Transactions->patchEntity($transaction, $this->request->getData());

        // $transaction->trade_date = $this->DateFormat
        //     ->convertDate($this->request->getData('trade_date'));

        if ($this->Transactions->save($transaction)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }

        $this->set([
            'message' => $message,
            'investment' => $transaction
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
        $transaction = $this->Transactions->get($id);
        $message = 'Deleted';

        if (!$this->Transactions->delete($transaction)) {
            $message = 'Error';
        }

        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function totalPortfolio()
    {
        $this->Authorization->skipAuthorization();

        $total = $this->Transactions->find()
            ->contain([
                'Users'
            ])->where([
                'Users.id' => $this->Authentication->getIdentity()->id
            ])->sumOf('total');

        $this->set(compact('total'));
    }

    /*
    |  1 | FIIS   |
    |  2 | STOCKS |
    */
    public function totalPerType($type = null)
    {
        $this->Authorization->skipAuthorization();

        $total = $this->Transactions->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ],
                'Users'
            ])
            ->where([
                'AssetsType.id' => (int) $type,
                'Users.id' => $this->Authentication->getIdentity()->id
            ])
            ->sumOf('total');

        $this->set(compact('total'));
    }

    public function monthlyTransactions()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->Transactions->find();
        $monthlyTransactions = $query->select([
            'label' => 'MONTHNAME(trade_date)',
            'y' => $query->func()->sum('total')
        ])->contain([
            'Users'
        ])->where([
            'Users.id' => $this->Authentication->getIdentity()->id
        ])->group('MONTHNAME(trade_date)')
            ->order('FIELD(label,"January","February","March", "June", "July","August","September","October","November","December")');

        $this->set(compact('monthlyTransactions'));
    }

    public function monthlyTransactionsPerType()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->Transactions->find();

        $monthlyTransactions = $query->select([
            'label' => 'MONTHNAME(trade_date)',
            'y' => $query->func()->sum('total'),
            'type_id' => 'AssetsType.id'
        ])->contain([
            'Assets' => [
                'AssetsType'
            ],
            'Users'
        ])->where([
            'Users.id' => $this->Authentication->getIdentity()->id
        ])->group([
            'MONTHNAME(trade_date)',
            'AssetsType.id'
        ])->order('FIELD(label,"January","February","March", "June", "July","August","September","October","November","December")');

        $this->set(compact('monthlyTransactions'));
    }

    public function totalPerAsset()
    {
        $this->Authorization->skipAuthorization();

        $query = $this->Transactions->find();

        $total = $this->Transactions->find()
            ->sumOf('total');

        $result = $query->select([
            'name' => 'symbol',
            'y' => $query->func()->sum('total'),
            'x' => $query->func()->sum('quantity'),
            'type_id' => 'AssetsType.id',
            'p' => 'concat(round(( sum(total)/' . $total . ' * 100 ),2),\'\')'
        ])->contain([
            'Assets' => [
                'AssetsType',
                'Users'
            ]
        ])->where([
            'Users.id' => $this->Authentication->getIdentity()->id
        ])->group([
            'symbol',
            'AssetsType.id'
        ])->order(['AssetsType.id']);

        $this->set(compact('result'));
    }
}
