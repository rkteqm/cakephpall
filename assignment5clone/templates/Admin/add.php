<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<div class="container-fluid">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <div class="container">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <?= $this->Flash->render() ?>
            <div class="cars form content">
                <?= $this->Form->create($car, ["enctype" => "multipart/form-data", 'id' => 'carform']) ?>
                <fieldset>
                    <legend><?= __('Add Car') ?></legend>
                    <?php
                    echo '<label for="image">Image <span class="required">*</span></label>';
                    echo $this->Form->input('image', ['required' => false, 'type' => 'file']);
                    echo '<label for="company">Company <span class="required">*</span></label>';
                    echo $this->Form->input('company', ['required' => false, 'type' => 'text']);
                    echo '<label for="brand">Brand <span class="required">*</span></label>';
                    echo $this->Form->select(
                        'brand',
                        [
                            $brands[1] => $brands[1],
                            $brands[2] => $brands[2],
                            $brands[3] => $brands[3],
                        ],
                        ['empty' => 'Select car brand']
                    );
                    echo '<label for="model">Model <span class="required">*</span></label>';
                    echo $this->Form->select(
                        'model',
                        [
                            '4x4' => '4x4',
                            '4x2' => '4x2',
                        ],
                        ['empty' => 'Select car model']
                    );
                    echo '<label for="make">Make <span class="required">*</span></label>';
                    echo $this->Form->select(
                        'make',
                        [
                            '2008' => '2008',
                            '2009' => '2009',
                            '2010' => '2010',
                            '2011' => '2011',
                            '2012' => '2012',
                            '2013' => '2013',
                            '2014' => '2014',
                            '2015' => '2015',
                            '2016' => '2016',
                            '2017' => '2017',
                            '2018' => '2018',
                            '2019' => '2019',
                            '2020' => '2020',
                            '2021' => '2021',
                            '2022' => '2022',
                            '2023' => '2023',
                        ],
                        ['empty' => 'Select make year']
                    );
                    echo '<label for="color">Color <span class="required">*</span></label>';
                    echo $this->Form->select(
                        'color',
                        [
                            'Red' => 'Red',
                            'Black' => 'Black',
                            'White' => 'White',
                        ],
                        ['empty' => 'Select car color']
                    );
                    echo '<label for="description">Description <span class="required">*</span></label>';
                    echo $this->Form->textarea('description', ['required' => false, 'type' => 'textarea']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

    });
</script>