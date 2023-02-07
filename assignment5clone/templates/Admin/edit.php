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
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $car->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $car->id), 'class' => 'side-nav-item']
                    ) ?>
                    <?= $this->Html->link(__('List Cars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <?= $this->Flash->render() ?>
            <div class="cars form content">
                <?= $this->Form->create($car, ["enctype" => "multipart/form-data", 'id' => 'carformedit']) ?>
                <fieldset>
                    <legend><?= __('Edit Car') ?></legend>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo '<label for="image">Image <span class="required">*</span></label>'; ?>
                            <?= $this->Form->input('image', ['type' => 'file', 'required' => false]) ?>
                            <span class="error-message" id="file-name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <td><?= $this->Html->image(h($car->image), array('width' => '250px')) ?></td>
                        </div>
                    </div>
                    <?php
                    echo '<label for="company">Company <span class="required">*</span></label>';
                    echo $this->Form->input('company', ['required' => false, 'type' => 'text']);
                    echo '<label for="brand">Brand <span class="required">*</span></label>';
                    echo $this->Form->select('brand', [
                        $brands[1] => $brands[1],
                        $brands[2] => $brands[2],
                        $brands[3] => $brands[3],
                    ]);
                    echo '<label for="model">Model <span class="required">*</span></label>';
                    echo $this->Form->select('model', [
                        '4x4' => '4x4',
                        '4x2' => '4x2',
                    ]);
                    echo '<label for="make">Make <span class="required">*</span></label>';
                    echo $this->Form->select('make', [
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
                    ]);
                    echo '<label for="color">Color <span class="required">*</span></label>';
                    echo $this->Form->select('color', [
                        'Red' => 'Red',
                        'Black' => 'Black',
                        'White' => 'White',
                    ]);
                    echo '<label for="description">Description <span class="required">*</span></label>';
                    echo $this->Form->input('description', ['required' => false, 'type' => 'textarea']);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>