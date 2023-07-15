<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvestmentsType $investmentsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Investments Type'), ['action' => 'edit', $investmentsType->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Investments Type'), ['action' => 'delete', $investmentsType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $investmentsType->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Investments Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Investments Type'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="investmentsType view content">
            <h3><?= h($investmentsType->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Symbol') ?></th>
                    <td><?= h($investmentsType->symbol) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($investmentsType->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($investmentsType->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
