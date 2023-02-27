<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Material Dashboard 2</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">dashboard</i></div><span class="nav-link-text ms-1">Dashboard</span>' . __(''), ['controller' => 'Admin', 'action' => 'dashboard'], ['escape' => false, 'title' => __('Dashboard'), 'class' => 'nav-link text-white']) ?>
            </li> -->
            <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">table_view</i></div><span class="nav-link-text ms-1">Cars Table</span>' . __(''), ['controller' => 'Admin', 'action' => 'tables'], ['escape' => false, 'title' => __('Cars Table'), 'class' => 'nav-link text-white']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">table_view</i></div><span class="nav-link-text ms-1">Cars Category</span>' . __(''), ['controller' => 'Admin', 'action' => 'carscategory'], ['escape' => false, 'title' => __('Cars Category'), 'class' => 'nav-link text-white']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">table_view</i></div><span class="nav-link-text ms-1">Users Table</span>' . __(''), ['controller' => 'Admin', 'action' => 'userstable'], ['escape' => false, 'title' => __('Users Table'), 'class' => 'nav-link text-white']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="fa-solid fa-upload opacity-10"></i></div><span class="nav-link-text ms-1">Add Car</span>' . __(''), ['controller' => 'Admin', 'action' => ''], ['escape' => false, 'title' => __('Add Car'), 'class' => 'nav-link text-white', 'href' => 'javascript:void(0)', 'id' => 'createNewCar']) ?>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <!-- <li class="nav-item">
                <?= $this->Html->link('<div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">person</i></div><span class="nav-link-text ms-1">Profile</span>' . __(''), ['controller' => 'Admin', 'action' => 'profile'], ['escape' => false, 'title' => __('Profile'), 'class' => 'nav-link text-white']) ?>
            </li> -->
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