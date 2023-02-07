<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="container-fluid">
    <div class="row">
        <aside class="column">
            <div class="side-nav">
                <div class="container">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('Car Listing'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                    <?= $this->Html->link(__('User Listing'), ['action' => 'userindex'], ['class' => 'active side-nav-item']) ?>
                </div>
            </div>
        </aside>
        <div class="column-responsive column-90">
            <div class="cars index content">
                <?= $this->Flash->render() ?>
                <h3><?= __('Users') ?></h3>
                <div class="col-6 float-left">
                    <form class="form-inline form-control">
                        <input class="form-control mr-sm-2" id="searchBox" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
                <div class="table-responsive">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th class="txtcenter"><?= $this->Paginator->sort('Sr No') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('email') ?></th>
                                <th class="actions txtcenter"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($users as $user) : ?>
                                <tr>
                                    <td class="txtcenter"><?= $i ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <td><?= h($user->email) ?></td>
                                    <td class="actions txtcenter">
                                        <span class="greenview">
                                            <?= $this->Html->link(__(''), ['action' => 'userview', $user->id], ['class' => 'bigfont fa-solid fa-eye']) ?>
                                        </span>
                                        <span class="blueedit">
                                            <?= $this->Html->link(__(''), ['action' => 'useredit', $user->id], ['class' => 'bigfont fa-solid fa-pen-to-square']) ?>
                                        </span>
                                        <span class="reddelete">
                                            <?= $this->Form->postLink(__(''), ['action' => 'userdelete', $user->id], ['class' => 'bigfont fa-solid fa-trash', 'confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function performSearch() {

        // Declare search string 
        var filter = searchBox.value.toUpperCase();

        // Loop through first tbody's rows
        for (var rowI = 0; rowI < trs.length; rowI++) {

            // define the row's cells
            var tds = trs[rowI].getElementsByTagName("td");

            // hide the row
            trs[rowI].style.display = "none";

            // loop through row cells
            for (var cellI = 0; cellI < tds.length; cellI++) {

                // if there's a match
                if (tds[cellI].innerHTML.toUpperCase().indexOf(filter) > -1) {

                    // show the row
                    trs[rowI].style.display = "";

                    // skip to the next row
                    continue;

                }
            }
        }

    }

    // declare elements
    const searchBox = document.getElementById('searchBox');
    const table = document.getElementById("myTable");
    const trs = table.tBodies[0].getElementsByTagName("tr");

    // add event listener to search box
    searchBox.addEventListener('keyup', performSearch);
</script>