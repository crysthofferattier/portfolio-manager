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

        // $dividend->date = $this->DateFormat
        //     ->convertDate($this->request->getData('date'));

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
        $fiis = $this->Dividends->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ]
            ])
            ->where([
                'AssetsType.id' => '1'
            ]);

        $stocks = $this->Dividends->find()
            ->contain([
                'Assets' => [
                    'AssetsType'
                ]
            ])
            ->where([
                'AssetsType.id' => '2'
            ]);

        $total = $this->Dividends->find()
            ->sumOf('value');



        $this->set(compact('stocks', 'fiis', 'total'));
    }
}
