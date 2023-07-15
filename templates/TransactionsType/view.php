<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TransactionsType $transactionsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transactions Type'), ['action' => 'edit', $transactionsType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transactions Type'), ['action' => 'delete', $transactionsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactionsType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transactions Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transactions Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transactionsType view content">
            <h3><?= h($transactionsType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Symbol') ?></th>
                    <td><?= h($transactionsType->symbol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($transactionsType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($transactionsType->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
