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
                <?= $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $user->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
                ) ?>
                <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
        </aside>
        <div class="column-responsive column-100">
            <div class="users form content">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <legend><?= __('Edit User') ?></legend>
                    <?php
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <?= $this->Form->control('first_name') ?>
                            <span class="error-message" id="first-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('last_name') ?>
                            <span class="error-message" id="last-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('email') ?>
                            <span class="error-message" id="email-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('phone_number') ?>
                            <span class="error-message" id="phone-number-error"></span>
                        </div>
                        <div class="col-md-6">
                            <?= $this->Form->control('password') ?>
                            <span class="error-message" id="password-error"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <div class="rahul">
                                <?= $this->Form->radio(
                                    'gender',
                                    ['Male' => 'Male', 'Female' => 'Female']
                                ) ?>
                            </div>
                            <span class="error-message" id="gender-error"></span>
                        </div>
                        <!-- <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <input type="radio" name="gender" value="Male">Male
                            <input type="radio" name="gender" value="Female">Female
                            <span class="error-message" id="gender-error"></span>
                        </div> -->
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>