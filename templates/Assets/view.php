<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asset $asset
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Asset'), ['action' => 'edit', $asset->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Asset'), ['action' => 'delete', $asset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $asset->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Assets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Asset'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assets view content">
            <h3><?= h($asset->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Symbol') ?></th>
                    <td><?= h($asset->symbol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Transactions Type') ?></th>
                    <td><?= $asset->has('transactions_type') ? $this->Html->link($asset->transactions_type->id, ['controller' => 'TransactionsType', 'action' => 'view', $asset->transactions_type->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($asset->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
