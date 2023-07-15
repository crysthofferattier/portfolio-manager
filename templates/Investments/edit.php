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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $investment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $investment->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Investments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="investments form content">
            <?= $this->Form->create($investment) ?>
            <fieldset>
                <legend><?= __('Edit Investment') ?></legend>
                <?php
                    echo $this->Form->control('symbol');
                    echo $this->Form->control('quantity');
                    echo $this->Form->control('value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
