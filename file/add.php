<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Detail $detail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="details form content">
            <?= $this->Form->create($details, ['id' => 'user_id']) ?>
            <fieldset>
                <legend><?= __('Add Detail') ?></legend>
                <?php
                echo $this->Form->control('name');
                echo $this->Form->control('image',['type'=>'file', 'onchange'=> "getBase64()"]);
                echo $this->Form->control('email');
                echo $this->Form->hidden('image_data', ['id'=> "image_data"]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <button type="button" onClick=saveUserAjax()>Save By Ajax</button>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>