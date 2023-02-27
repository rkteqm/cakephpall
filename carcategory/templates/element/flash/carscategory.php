<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Category table</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active Cars</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Cars</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($cats)) {
                                foreach ($cats as $cat) {
                            ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $cat->name ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <?php
                                        $nn = 0;
                                        if (!empty($cat->cars)) {
                                            foreach ($cat->cars as $car) {
                                                if ($car->status == 1) {
                                                    $nn++;
                                                }
                                            }
                                        }
                                        ?>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold activestatus"><?= $nn ?></span>
                                        </td>
                                        <?php
                                        $nnn = 0;
                                        if (!empty($cat->cars)) {
                                            foreach ($cat->cars as $car) {
                                                $nnn++;
                                            }
                                        }
                                        ?>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $nnn ?></span>
                                            <input type="hidden" value="<?= $nnn ?>" class="inactivecars">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $cat->created_at ?></span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <input type="hidden" value="<?= $nn ?>">
                                            <?php if ($cat->status == 1) { ?>
                                                <span class="badge badge-smc bg-gradient-success" data-id="<?= $cat->id ?>">Active</span>
                                            <?php } else { ?>
                                                <span class="badge badge-smc bg-gradient-secondary" data-id="<?= $cat->id ?>">Inactive</span>
                                            <?php } ?>
                                            <input type="hidden" value="<?= $cat->status ?>">
                                        </td>
                                        <td class="align-middle">
                                            <?= $this->Html->link(__('Edit'), ['action' => 'editcat', $cat->id], ['class' => 'text-secondary font-weight-bold text-xs']) ?>
                                            <a href="" class="text-secondary font-weight-bold text-xs deleteCat">Delete</a>
                                            <input type="hidden" value="<?= $cat->id ?>">
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