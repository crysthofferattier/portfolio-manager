<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asset $asset
 * @var \Cake\Collection\CollectionInterface|string[] $transactionsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assets form content">
            <?= $this->Form->create($asset) ?>
            <fieldset>
                <legend><?= __('Add Asset') ?></legend>
                <?php
                    echo $this->Form->control('symbol');
                    echo $this->Form->control('type_id', ['options' => $transactionsType]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
