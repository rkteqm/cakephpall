<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <h4 class="heading"><?= __('Actions') ?></h4>
                <?= $this->Html->link(__('Login'), ['action' => 'login'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-80">
            <?= $this->Flash->render() ?>
            <div class="users form content">
                <?= $this->Form->create($user, ['id' => 'regform']) ?>
                <fieldset>
                    <legend><?= __('Add User') ?></legend>
                    <?php
                    echo '<label for="name">Name <span class="required">*</span></label>';
                    echo $this->Form->input('name', ['required' => 'false', 'type' => 'text']);
                    echo '<label for="email">Email <span class="required">*</span></label>';
                    echo $this->Form->control('email', ['required' => 'false', 'label' => false, 'type' => 'email', 'id' => 'email']);
                    echo '<label for="password">Password <span class="required">*</span></label>';
                    echo $this->Form->input('password', ['required' => 'false', 'type' => 'password', 'id' => 'password']);
                    echo '<label for="confirm_password">Confirm Password <span class="required">*</span></label>';
                    echo $this->Form->input('confirm_password', ['required' => 'false', 'type' => 'password']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>