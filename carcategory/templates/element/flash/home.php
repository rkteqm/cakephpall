<div class="col-12 mt-2">
    <div class="mb-5 ps-3">
        <h6 class="mb-1">Cars</h6>
        <p class="text-sm">Engineers design cars</p>
    </div>
    <div class="row">
        <?php
        if (!empty($cars)) {
            foreach ($cars as $car) {
        ?>
                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4 mt-4">
                    <div class="card card-blog card-plain">
                        <div class="card-header p-0 mt-n4 mx-3">
                            <a class="d-block shadow-xl border-radius-xl">
                                <!-- <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl"> -->
                                <?= $this->Html->image(h($car->image), array('class' => 'img-fluid shadow border-radius-xl carheight')) ?>
                            </a>
                        </div>
                        <div class="card-body p-3">
                            <p class="mb-0 text-sm"><?= $car->company ?></p>
                            <a href="javascript:;">
                                <h5>
                                    <?= $car->brand ?>
                                </h5>
                            </a>
                            <p class="mb-4 text-sm">
                                <?= $car->description ?>
                                <!-- As Uber works through a huge amount of internal management turmoil. -->
                            </p>
                            <div class="d-flex align-items-center justify-content-between">
                                <!-- <button type="button" class="btn btn-outline-primary btn-sm mb-0">View Project</button> -->
                                <?= $this->Html->link(__('View Car'), ['action' => '', $car->id], ['class' => 'viewtest btn btn-outline-primary btn-sm mb-0']) ?>
                                <input type="hidden" value="<?= $car->id ?>">
                                <div class="avatar-group mt-2">
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Elena Morison">
                                        <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                        <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                        <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                        <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>