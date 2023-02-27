<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Cars table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table id="myTable" class="table align-items-center justify-content-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Car Company</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Variant</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Make</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Rating</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($cars)) {
                                foreach ($cars as $car) {
                            ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <?= $this->Html->image(h($car->image), ['class' => 'class="avatar avatar-sm me-3 border-radius-lg', "style" => "width: 70px !important; height: 50px !important;", 'alt' => "user1"]) ?>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $car->brand ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $car->company ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $categ[$car->cat_id] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $car->model ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $car->make ?></p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0"><?= $car->color ?></p>
                                        </td>
                                        <?php
                                        $sum = 0;
                                        $n = 0;
                                        $avg = 0;
                                        if (!empty($car->ratings)) {
                                            foreach ($car->ratings as $rating) {
                                                $n++;
                                                $sum += $rating->star;
                                            }
                                            $avg = intval(($sum / $n) * 20);
                                        }
                                        ?>
                                        <td class="align-middle text-center">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <span class="me-2 text-xs font-weight-bold"><?= $avg ?>%</span>
                                                <div>
                                                    <div class="progress">
                                                        <?php if ($avg > 75) { ?>
                                                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="<?= $avg ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $avg ?>%;"></div>
                                                        <?php } elseif ($avg <= 75 && $avg > 50) { ?>
                                                            <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="<?= $avg ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $avg ?>%;"></div>
                                                        <?php } elseif ($avg <= 50 && $avg > 25) { ?>
                                                            <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="<?= $avg ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $avg ?>%;"></div>
                                                        <?php } else { ?>
                                                            <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="<?= $avg ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?= $avg ?>%;"></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-xs text-secondary mb-0"><?= $n ?> review</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <input type="hidden" value="<?= $car->id ?>">
                                            <?php if ($car->status == 1) { ?>
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            <?php } else { ?>
                                                <span class="badge badge-sm bg-gradient-secondary">Inactive</span>
                                            <?php } ?>
                                            <input type="hidden" value="<?= $car->status ?>">
                                        </td>
                                        <td class="align-middle">
                                            <?= $this->Html->link(__('View'), ['action' => 'viewcar', $car->id], ['class' => 'text-secondary font-weight-bold text-xs']) ?>
                                            <a href="javascript:void(0)" data-toggle="tooltip" data-id="<?= $car->id ?>" data-original-title="Edit" class="text-secondary font-weight-bold text-xs editCar">Edit</a>
                                            <a href="" class="text-secondary font-weight-bold text-xs deleteItem">Delete</a>
                                            <input type="hidden" value="<?= $car->id ?>">
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>