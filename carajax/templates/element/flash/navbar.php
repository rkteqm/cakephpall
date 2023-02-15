<!-- Navbar -->
<nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
  <div class="container-fluid ps-2 pe-0">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
      Material Dashboard 2
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon mt-2">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <?= $this->Html->link('<i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>' . __('Dashboard'), ['controller' => 'Users', 'action' => 'home'], ['escape' => false, 'title' => __('Dashboard'), 'class' => 'nav-link me-2']) ?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('<i class="fas fa-user-circle opacity-6 text-dark me-1"></i>' . __('Sign Up'), ['controller' => 'Users', 'action' => ''], ['escape' => false, 'title' => __('Sign Up'), 'class' => 'signuptest nav-link me-2']) ?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('<i class="fas fa-key opacity-6 text-dark me-1"></i>' . __('Sign In'), ['controller' => 'Users', 'action' => ''], ['escape' => false, 'title' => __('Sign In'), 'class' => 'signintest nav-link me-2']) ?>
        </li>
      </ul>
      <ul class="navbar-nav d-lg-flex d-none">
        <li class="nav-item d-flex align-items-center">
          <a class="btn btn-outline-primary btn-sm mb-0 me-2" target="_blank" href="https://www.creative-tim.com/builder/material?ref=navbar-dashboard">Online Builder</a>
        </li>
        <li class="nav-item">
          <a href="https://www.creative-tim.com/product/material-dashboard" class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->