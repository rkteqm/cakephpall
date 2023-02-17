<body class="g-sidenav-show  bg-gray-200">
    <!-- Aside -->
    <?php echo $this->element('flash/asideadmin') ?>
    <!-- End Aside -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php echo $this->element('flash/navadmin') ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
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
                                                        <p class="text-xs font-weight-bold mb-0"><?= $car->cat_id ?></p>
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
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $nn ?></span>
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
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $cat->created_at ?></span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <input type="hidden" value="<?= $cat->id ?>">
                                                        <?php if ($cat->status == 1) { ?>
                                                            <span class="badge badge-smc bg-gradient-success">Active</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-smc bg-gradient-secondary">Inactive</span>
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
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Users table</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created At</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($users)) {
                                            foreach ($users as $user) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm"><?= $user->name ?></h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0"><?= $user->email ?></p>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-xs font-weight-bold"><?= $user->created_at ?></span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?= $this->Html->link(__('Edit'), ['action' => 'edituser', $user->id], ['class' => 'text-secondary font-weight-bold text-xs']) ?>
                                                        <a href="" class="text-secondary font-weight-bold text-xs deleteUser">Delete</a>
                                                        <input type="hidden" value="<?= $user->id ?>">
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
            <div class="modal fade" id="ajaxModelEdit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeadingEdit"></h4>
                        </div>
                        <div class="modal-body">
                            <?= $this->Form->create($car, ["enctype" => "multipart/form-data", 'id' => 'carformedit', 'class' => 'form-horizontal']) ?>
                            <fieldset>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->input('image', ['required' => false, 'type' => 'file', 'class' => 'form-control']) ?>
                                    <input type="hidden" id="imagedd" name="imagedd">
                                    <input type="hidden" id="iddd" name="iddd">
                                    <?= $this->Html->image(h($car->image), array('width' => '250px', 'id' => 'showimg')) ?>
                                </div>
                                <?= $this->Form->error('company') ?>
                                <label id="company-error" class="error" for="company"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->input('company', ['required' => false, 'label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'company']) ?>
                                </div>
                                <?= $this->Form->error('brand') ?>
                                <label id="brand-error" class="error" for="brand"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'brand',
                                        [
                                            'Thar' => 'Thar',
                                            'Fortuner' => 'Fortuner',
                                            'Alto' => 'Alto',
                                        ],
                                        ['class' => 'form-control', 'id' => 'brand']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('model') ?>
                                <label id="model-error" class="error" for="model"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'model',
                                        [
                                            '4x4' => '4x4',
                                            '4x2' => '4x2',
                                        ],
                                        ['class' => 'form-control', 'id' => 'model']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('make') ?>
                                <label id="make-error" class="error" for="make"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'make',
                                        [
                                            '2016' => '2016',
                                            '2017' => '2017',
                                            '2018' => '2018',
                                            '2019' => '2019',
                                            '2020' => '2020',
                                            '2021' => '2021',
                                            '2022' => '2022',
                                            '2023' => '2023',
                                        ],
                                        ['class' => 'form-control', 'id' => 'make']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('color') ?>
                                <label id="color-error" class="error" for="color"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'color',
                                        [
                                            'Red' => 'Red',
                                            'Black' => 'Black',
                                            'White' => 'White',
                                        ],
                                        ['class' => 'form-control', 'id' => 'color']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('description') ?>
                                <label id="description-error" class="error" for="description"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->textarea('description', ['required' => false, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description']) ?>
                                </div>
                            </fieldset>
                            <div class="text-center">
                                <?= $this->Form->button(__('Submit'), ["class" => "btn btn-lg bg-gradient-primary btn-lg w-30 mt-4 mb-0"]) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                            <?= $this->Form->create($car, ["enctype" => "multipart/form-data", 'id' => 'carform', 'class' => 'form-horizontal']) ?>
                            <fieldset>
                                <?= $this->Form->error('image') ?>
                                <label id="image-error" class="error" for="image"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->input('image', ['required' => false, 'type' => 'file', 'class' => 'form-control']) ?>
                                    <input type="hidden" id="image" name="imagedd">
                                    <input type="hidden" id="iddd" name="iddd">
                                    <input type="hidden" name="user_id" value="<?= $usercar->id ?>">
                                    <input type="hidden" name="user_name" value="<?= $usercar->name ?>">
                                </div>
                                <?= $this->Form->error('category') ?>
                                <label id="category-error" class="error" for="category"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'cat_id',
                                        $category,
                                        ['empty' => 'Select car category', 'class' => 'form-control', 'id' => 'category']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('company') ?>
                                <label id="company-error" class="error" for="company"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label">Company</label> -->
                                    <?= $this->Form->input('company', ['required' => false, 'label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'company']) ?>
                                </div>
                                <?= $this->Form->error('brand') ?>
                                <label id="brand-error" class="error" for="brand"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'brand',
                                        [
                                            $brands[1] => $brands[1],
                                            $brands[2] => $brands[2],
                                            $brands[3] => $brands[3],
                                        ],
                                        ['empty' => 'Select car brand', 'class' => 'form-control', 'id' => 'brand']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('model') ?>
                                <label id="model-error" class="error" for="model"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'model',
                                        [
                                            '4x4' => '4x4',
                                            '4x2' => '4x2',
                                        ],
                                        ['empty' => 'Select car model', 'class' => 'form-control', 'id' => 'model']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('make') ?>
                                <label id="make-error" class="error" for="make"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'make',
                                        [
                                            '2016' => '2016',
                                            '2017' => '2017',
                                            '2018' => '2018',
                                            '2019' => '2019',
                                            '2020' => '2020',
                                            '2021' => '2021',
                                            '2022' => '2022',
                                            '2023' => '2023',
                                        ],
                                        ['empty' => 'Select make year', 'class' => 'form-control', 'id' => 'make']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('color') ?>
                                <label id="color-error" class="error" for="color"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'color',
                                        [
                                            'Red' => 'Red',
                                            'Black' => 'Black',
                                            'White' => 'White',
                                        ],
                                        ['empty' => 'Select car color', 'class' => 'form-control', 'id' => 'color']
                                    ) ?>
                                </div>
                                <?= $this->Form->error('description') ?>
                                <label id="description-error" class="error" for="description"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->textarea('description', ['required' => false, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description']) ?>
                                </div>
                            </fieldset>
                            <div class="text-center">
                                <?= $this->Form->button(__('Submit'), ["class" => "btn btn-lg bg-gradient-primary btn-lg w-30 mt-4 mb-0"]) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit model end -->
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100" href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

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