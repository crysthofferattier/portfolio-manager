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
            <?= $this->Html->link(__('List Transactions Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="transactionsType form content">
            <?= $this->Form->create($transactionsType) ?>
            <fieldset>
                <legend><?= __('Add Transactions Type') ?></legend>
                <?php
                    echo $this->Form->control('symbol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
