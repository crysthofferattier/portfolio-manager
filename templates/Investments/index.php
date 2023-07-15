<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Investment> $investments
 */
?>
<div class="investments index content">
    <?= $this->Html->link(__('New Investment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Investments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('symbol') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('date_trade') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($investments as $investment) : ?>
                    <tr>
                        <td><?= $this->Number->format($investment->id) ?></td>
                        <td><?= h($investment->symbol) ?></td>
                        <td><?= $investment->quantity === null ? '' : $this->Number->format($investment->quantity) ?></td>
                        <td><?= $investment->value === null ? '' : $this->Number->format($investment->value) ?></td>
                        <td><?= h($investment->total) ?></td>
                        <td><?= h($investment->investments_type->symbol) ?></td>
                        <td><?= h($investment->trade_date) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $investment->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $investment->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $investment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investment->id)]) ?>
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