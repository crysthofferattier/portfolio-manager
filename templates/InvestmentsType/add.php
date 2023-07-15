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
            <?= $this->Html->link(__('List Investments Type'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="investmentsType form content">
            <?= $this->Form->create($investmentsType) ?>
            <fieldset>
                <legend><?= __('Add Investments Type') ?></legend>
                <?php
                    echo $this->Form->control('symbol');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
