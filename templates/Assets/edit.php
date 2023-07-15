<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Asset $asset
 * @var string[]|\Cake\Collection\CollectionInterface $transactionsType
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $asset->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $asset->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Assets'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assets form content">
            <?= $this->Form->create($asset) ?>
            <fieldset>
                <legend><?= __('Edit Asset') ?></legend>
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
