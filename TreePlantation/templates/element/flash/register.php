<!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 150px;
        "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
        <div class="card-body py-5 px-md-5">

            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h2 class="fw-bold mb-5">Sign up now</h2>
                    <?= $this->Form->create($user, ['id' => 'regform']) ?>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">First name <span class="error">*</span> </label>
                                <?= $this->Form->error('first_name') ?>
                                <label id="first_name-error" class="error" for="first_name"></label>
                                <?= $this->Form->input('first_name', ['required' => 'false', 'placeholder' => 'Enter your First Name', 'type' => 'text','id' => 'first_name',  'class' => 'form-control']) ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Last name<span class="error">*</span></label>
                                <?= $this->Form->error('last_name') ?>
                                <label id="last_name-error" class="error" for="last_name"></label>
                                <?= $this->Form->input('last_name', ['required' => 'false', 'placeholder' => 'Enter your Last Name', 'type' => 'text','id' => 'last_name',  'class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Email<span class="error">*</span></label>
                                <?= $this->Form->error('email') ?>
                                <label id="email-error" class="error" for="email"></label>
                                <?= $this->Form->input('email', ['required' => 'false', 'placeholder' => 'Enter your Email', 'label' => false, 'type' => 'email', 'id' => 'email', 'class' => 'form-control', "data-validity-message" => "Please enter your email", "oninvalid" => "this.setCustomValidity(''); if (!this.value) this.setCustomValidity(this.dataset.validityMessage)", "oninput" => "this.setCustomValidity('')", "aria-required" => "true"]) ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example4">Password<span class="error">*</span></label>
                                <?= $this->Form->error('password') ?>
                                <label id="password-error" class="error" for="password"></label>
                                <?= $this->Form->input('password', ['required' => 'false', 'placeholder' => 'Enter your Password', 'type' => 'password', 'id' => 'password', 'class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example4">Confirm Password<span class="error">*</span></label>
                                <?= $this->Form->error('confirm_password') ?>
                                <label id="confirm_password-error" class="error" for="confirm_password"></label>
                                <?= $this->Form->input('confirm_password', ['required' => 'false', 'placeholder' => 'Enter your Confirm Password', 'type' => 'password', 'id' => 'confirm_password', 'class' => 'form-control']) ?>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1">Promo Code (Optional)</label>
                                <?= $this->Form->error('code') ?>
                                <label id="code-error" class="error" for="code"></label>
                                <?= $this->Form->input('code', ['required' => 'false', 'placeholder' => 'Enter your Promo Code (Optional)', 'type' => 'text', 'class' => 'form-control']) ?>
                            </div>
                        </div>
                    </div>

                    <!-- Checkbox -->
                    <div class="form-check d-flex justify-content-center mb-4">
                        <?= $this->Form->error('terms') ?>
                        <label class="form-check-label" for="form2Example3">
                        <?= $this->Form->input('terms', ['required' => 'false', 'type' => 'checkbox', 'value' => '1', 'class' => 'form-check-input me-3', 'checked']) ?>
                            I have read and agreed to the <a href="#!" class=""><u>Terms and Conditions</u></a> (Mandatory to check)
                        </label>
                    </div>
                    <div class="form-check d-flex justify-content-center mb-4">
                        <?= $this->Form->input('subscribe', ['required' => 'false', 'type' => 'checkbox', 'value' => '1', 'class' => 'form-check-input me-3']) ?>
                        <label class="form-check-label" for="form2Example3">
                            Please send me marketing communications (including updates and offers)(Optional to check)
                        </label>
                    </div>

                    <!-- Submit button -->
                    <?= $this->Form->button(__('Register'), ['type' => 'submit', "class" => "btn btn-primary btn-block mb-4"]) ?>

                    <p>Already have an account? <?= $this->Html->link(__('Login here'), ['controller' => 'Users', 'action' => 'login']) ?></p>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Design Block -->