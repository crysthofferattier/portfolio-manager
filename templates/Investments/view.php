<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Investment $investment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Investment'), ['action' => 'edit', $investment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Investment'), ['action' => 'delete', $investment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Investments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Investment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="investments view content">
            <h3><?= h($investment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Symbol') ?></th>
                    <td><?= h($investment->symbol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($investment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Quantity') ?></th>
                    <td><?= $investment->quantity === null ? '' : $this->Number->format($investment->quantity) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $investment->value === null ? '' : $this->Number->format($investment->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($investment->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
