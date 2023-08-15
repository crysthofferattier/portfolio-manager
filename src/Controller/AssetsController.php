<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\View\JsonView;

/**
 * Assets Controller
 *
 * @property \App\Model\Table\AssetsTable $Assets
 * @method \App\Model\Entity\Asset[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AssetsController extends AppController
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
        $assets = $this->Assets->find()
            ->where(['user_id' => $this->Authentication->getIdentity()->id])
            ->contain(['AssetsType']);

        $this->set(compact('assets'));
    }

    /**
     * View method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $asset = $this->Assets->get($id, [
            'where' => [
                'user_id' => $this->Authentication->getIdentity()->id,
            ],
            'contain' => ['AssetsType'],
        ]);

        $this->set(compact('asset'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $asset = $this->Assets->newEntity($this->request->getData());

        $asset->user_id = $this->Authentication->getIdentity()->id;

        if ($this->Assets->save($asset)) {
            $message = 'Asset saved!';
        } else {
            $message = $asset->getErrors();
        }
        $this->set([
            'message' => $message
        ]);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $asset = $this->Assets->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($asset);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $asset->user_id = $this->Authentication->getIdentity()->id;
            $asset = $this->Assets->patchEntity(
                $asset,
                $this->request->getData(),
                [
                    // Added: Disable modification of user_id.
                    'accessibleFields' => ['user_id' => false]
                ]
            );
            if ($this->Assets->save($asset)) {
                $this->Flash->success(__('The asset has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The asset could not be saved. Please, try again.'));
        }
        $transactionsType = $this->Assets->TransactionsType->find('list', ['limit' => 200])->all();
        $this->set(compact('asset', 'transactionsType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Asset id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $asset = $this->Assets->get($id);
        $this->Authorization->authorize($asset);
        
        if ($this->Assets->delete($asset)) {
            $this->Flash->success(__('The asset has been deleted.'));
        } else {
            $this->Flash->error(__('The asset could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
