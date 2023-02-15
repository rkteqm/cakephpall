<div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            <div class="row mt-3">
                                <div class="col-2 text-center ms-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-facebook text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center px-1">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-github text-white text-lg"></i>
                                    </a>
                                </div>
                                <div class="col-2 text-center me-auto">
                                    <a class="btn btn-link px-3" href="javascript:;">
                                        <i class="fa fa-google text-white text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?= $this->Flash->render() ?>
                    <div class="card-body">
                        <?= $this->Form->create() ?>
                        <label id="email-error" class="error" for="email"></label>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Email</label>
                            <?= $this->Form->input('email', ['required' => 'false', 'label' => false, 'type' => 'email', 'id' => 'email', 'class' => 'form-control', "data-validity-message" => "Please enter your email", "oninvalid" => "this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)", "oninput" => "this.setCustomValidity('')", "aria-required" => "true"]) ?>
                        </div>
                        <label id="password-error" class="error" for="password"></label>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Password</label>
                            <?= $this->Form->input('password', ['required' => 'false', 'type' => 'password', 'id' => 'password', 'class' => 'form-control']) ?>
                        </div>
                        <div class="form-check form-switch d-flex align-items-center mb-3">
                            <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                            <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <?= $this->Form->submit(__('Sign in'), ['class' => 'btn bg-gradient-primary w-100 my-4 mb-2']); ?>
                        </div>
                        <p class="mt-4 text-sm text-center">
                            Don't have an account?
                            <?= $this->Html->link(__('Sign up'), ['controller' => 'Users', 'action' => 'signup'], ['class' => 'text-primary text-gradient font-weight-bold']) ?>
                        </p>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>