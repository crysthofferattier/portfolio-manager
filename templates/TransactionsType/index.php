<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\TransactionsType> $transactionsType
 */
?>
<div class="transactionsType index content">
    <?= $this->Html->link(__('New Transactions Type'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Transactions Type') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('symbol') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactionsType as $transactionsType): ?>
                <tr>
                    <td><?= $this->Number->format($transactionsType->id) ?></td>
                    <td><?= h($transactionsType->symbol) ?></td>
                    <td><?= h($transactionsType->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $transactionsType->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $transactionsType->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $transactionsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionsType->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
