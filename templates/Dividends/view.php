<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dividend $dividend
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Dividend'), ['action' => 'edit', $dividend->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Dividend'), ['action' => 'delete', $dividend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dividend->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Dividends'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Dividend'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dividends view content">
            <h3><?= h($dividend->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Asset') ?></th>
                    <td><?= $dividend->has('asset') ? $this->Html->link($dividend->asset->id, ['controller' => 'Assets', 'action' => 'view', $dividend->asset->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($dividend->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Value') ?></th>
                    <td><?= $this->Number->format($dividend->value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($dividend->date) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
