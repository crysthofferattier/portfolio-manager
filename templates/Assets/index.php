<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Asset> $assets
 */
?>
<div class="assets index content">
    <?= $this->Html->link(__('New Asset'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Assets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('symbol') ?></th>
                    <th><?= $this->Paginator->sort('type_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assets as $asset): ?>
                <tr>
                    <td><?= $this->Number->format($asset->id) ?></td>
                    <td><?= h($asset->symbol) ?></td>
                    <td><?= $asset->has('transactions_type') ? $this->Html->link($asset->transactions_type->id, ['controller' => 'TransactionsType', 'action' => 'view', $asset->transactions_type->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $asset->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $asset->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $asset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asset->id)]) ?>
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
