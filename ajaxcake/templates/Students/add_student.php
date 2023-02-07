<span id="success"></span>
<div class="panel panel-primary">
  <div class="panel-heading">
    Add Student
    <?php
    echo $this->Html->link(
      'List Students',
      '/list-students',
      ['class' => 'btn btn-warning pull-right', 'style' => 'margin-top:-7px']
    );
    ?>
  </div>
  <div class="panel-body">
    <?= $this->Form->create($student, ['action' => 'javascript:void(0)', 'id' => 'frm-add-student']) ?>
    <fieldset>
      <legend><?= __('Add User') ?></legend>
      <?php
      echo $this->Form->control('name', ['required' => 'false']);
      echo $this->Form->control('email', ['required' => 'false']);
      echo $this->Form->control('phone_no', ['required' => 'false']);
      ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
  </div>