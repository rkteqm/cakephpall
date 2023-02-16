<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">dashboard</i></div><span class="nav-link-text ms-1">Dashboard</span>' . __(''), ['controller' => 'Admin', 'action' => 'dashboard'], ['escape' => false, 'title' => __('Dashboard'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">table_view</i></div><span class="nav-link-text ms-1">Tables</span>' . __(''), ['controller' => 'Admin', 'action' => 'tables'], ['escape' => false, 'title' => __('Tables'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-pen-to-square opacity-10"></i></div><span class="nav-link-text ms-1">Edit Car</span>' . __(''), ['controller' => 'Admin', 'action' => 'editcar', $car->id], ['escape' => false, 'title' => __('Edit Car'), 'class' => 'nav-link text-white active bg-gradient-primary']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-upload opacity-10"></i></div><span class="nav-link-text ms-1">Add Car</span>' . __(''), ['controller' => 'Admin', 'action' => 'addcar'], ['escape' => false, 'title' => __('Add Car'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">person</i></div><span class="nav-link-text ms-1">Profile</span>' . __(''), ['controller' => 'Admin', 'action' => 'profile'], ['escape' => false, 'title' => __('Profile'), 'class' => 'nav-link text-white']) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-right-from-bracket"></i></div><span class="nav-link-text ms-1">Log Out</span>' . __(''), ['controller' => 'Admin', 'action' => 'logout'], ['escape' => false, 'title' => __('Log Out'), 'class' => 'nav-link text-white']) ?>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Tables</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                            <label class="form-label">Type here...</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder/material?ref=navbar-dashboard">Online Builder</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <?= $this->Html->link('<i class="fa-solid fa-right-from-bracket"></i><span class="d-sm-inline d-none">Log Out</span>' . __(''), ['controller' => 'Admin', 'action' => 'logout'], ['escape' => false, 'title' => __('Log Out'), 'class' => 'nav-link text-body font-weight-bold px-0']) ?>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <main class="main-content  mt-0">
            <section>
                <div class="page-header min-vh-100">
                    <div class="container">
                        <div class="row">
                            <div class="card card-plain w-70">
                                <div class="card-header bg-transparent">
                                    <?= $this->Flash->render() ?>
                                    <h4 class="font-weight-bolder">Add New Car</h4>
                                    <p class="mb-0">Enter your car details</p>
                                </div>
                                <div class="card-body">
                                    <?= $this->Form->create($car, ["enctype" => "multipart/form-data", 'id' => 'carformedit']) ?>
                                    <fieldset>
                                        <?= $this->Form->error('image') ?>
                                        <label id="image-error" class="error" for="image"></label>
                                        <div class="input-group input-group-outline mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <?= $this->Form->input('image', ['required' => false, 'type' => 'file', 'class' => 'form-control']) ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <?= $this->Html->image(h($car->image), array('width' => '250px')) ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?= $this->Form->error('company') ?>
                                        <label id="company-error" class="error" for="company"></label>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Company</label>
                                            <?= $this->Form->input('company', ['required' => false, 'type' => 'text', 'class' => 'form-control']) ?>
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
                                                ['class' => 'form-control']
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
                                                ['class' => 'form-control']
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
                                                ['class' => 'form-control']
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
                                                ['class' => 'form-control']
                                            ) ?>
                                        </div>
                                        <?= $this->Form->error('description') ?>
                                        <label id="description-error" class="error" for="description"></label>
                                        <div class="input-group input-group-outline mb-3">
                                            <?= $this->Form->textarea('description', ['required' => false, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description']) ?>
                                        </div>
                                    </fieldset>
                                    <div class="text-center">
                                        <input type="hidden" value="<?= $car->id ?>">
                                        <?= $this->Form->button(__('Submit'), ["class" => "btn btn-lg bg-gradient-primary btn-lg w-30 mt-4 mb-0"]) ?>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
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
        <script src="/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>