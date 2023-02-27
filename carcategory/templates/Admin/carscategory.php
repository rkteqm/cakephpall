<body class="g-sidenav-show  bg-gray-200">
    <!-- Aside -->
    <?php echo $this->element('flash/asideadmin') ?>
    <!-- End Aside -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php echo $this->element('flash/navadmin') ?>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <!-- Tables -->
            <div id="tablecontent">
                <?php echo $this->element('flash/carscategory') ?>
            </div>
            <!-- End End Tables -->

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
                                <?= $this->Form->error('cat_id') ?>
                                <label id="cat_id-error" class="error" for="cat_id"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'cat_id',
                                        $category,
                                        ['class' => 'form-control', 'id' => 'cat_id']
                                    ) ?>
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
                                    <?= $this->Form->input('description', ['required' => false, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description']) ?>
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
                                <?= $this->Form->error('company') ?>
                                <label id="company-error" class="error" for="company"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <!-- <label class="form-label">Company</label> -->
                                    <?= $this->Form->input('company', ['required' => false, 'label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'company', 'placeholder' => 'company']) ?>
                                </div>
                                <?= $this->Form->error('cat_id') ?>
                                <label id="cat_id-error" class="error" for="cat_id"></label>
                                <div class="input-group input-group-outline mb-3">
                                    <?= $this->Form->select(
                                        'cat_id',
                                        $category,
                                        ['empty' => 'Select car category', 'class' => 'form-control', 'id' => 'cat_id']
                                    ) ?>
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
                                    <!-- <label class="form-label">Description</label> -->
                                    <?= $this->Form->input('description', ['required' => false, 'type' => 'textarea', 'class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description']) ?>
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