<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Dividend> $dividends
 */
?>
<div class="dividends index content">
    <?= $this->Html->link(__('New Dividend'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Dividends') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('asset_id') ?></th>
                    <th><?= $this->Paginator->sort('date') ?></th>
                    <th><?= $this->Paginator->sort('value') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dividends as $dividend): ?>
                <tr>
                    <td><?= $this->Number->format($dividend->id) ?></td>
                    <td><?= $dividend->has('asset') ? $this->Html->link($dividend->asset->id, ['controller' => 'Assets', 'action' => 'view', $dividend->asset->id]) : '' ?></td>
                    <td><?= h($dividend->date) ?></td>
                    <td><?= $this->Number->format($dividend->value) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $dividend->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dividend->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dividend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dividend->id)]) ?>
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
