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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $investmentsType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $investmentsType->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Investments Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="investmentsType form content">
            <?= $this->Form->create($investmentsType) ?>
            <fieldset>
                <legend><?= __('Edit Investments Type') ?></legend>
                <?php
                    echo $this->Form->control('symbol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
