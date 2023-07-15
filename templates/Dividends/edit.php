<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Dividend $dividend
 * @var string[]|\Cake\Collection\CollectionInterface $assets
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dividend->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dividend->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Dividends'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="dividends form content">
            <?= $this->Form->create($dividend) ?>
            <fieldset>
                <legend><?= __('Edit Dividend') ?></legend>
                <?php
                    echo $this->Form->control('asset_id', ['options' => $assets]);
                    echo $this->Form->control('date');
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
