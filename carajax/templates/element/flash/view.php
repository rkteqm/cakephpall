<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-500 border-radius-xl mt-4 carbimage" style="background-image: url('/img/<?= $car->image ?>'); background-size: cover;">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <?= $car->company ?>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <?= $car->brand ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Car Information</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?= $car->description ?>
                                Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally difficult paths, choose the one more painful in the short term (pain avoidance is creating an illusion of equality).
                            </p>
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Company:</strong> &nbsp; <?= $car->company ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Brand:</strong> &nbsp; <?= $car->brand ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Model:</strong> &nbsp; <?= $car->model ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Make:</strong> &nbsp; <?= $car->make ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Color:</strong> &nbsp; <?= $car->color ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Comments</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <?php if ($auth) { ?>
                                <a href="javascript:;" class="commentbtn btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto">
                                    <span class="">Post your review. . .</span>
                                    <span class="fas fa-user-edit text-secondary text-sm"></span>
                                    <input type="hidden" class="carid" value="<?= $car->id ?>">
                                    <input type="hidden" class="userid" value="<?= $user->id ?>">
                                    <input type="hidden" class="username" value="<?= $user->name ?>">
                                </a>
                            <?php } else { ?>
                                <a href="javascript:;" class="commentbtnlogin btn btn-link pe-3 ps-0 mb-0 ms-auto w-25 w-md-auto">
                                    <span class="">Post your review. . .</span>
                                    <i class="fas fa-user-edit text-secondary text-sm"></i>
                                </a>
                            <?php } ?>
                            <div id="" class="commentshow ratings form content">
                                <span class="ratestars">Rating
                                    <li class="star fa-solid fa-star" value="1"></li>
                                    <li class="star fa-regular fa-star" value="2"></li>
                                    <li class="star fa-regular fa-star" value="3"></li>
                                    <li class="star fa-regular fa-star" value="4"></li>
                                    <li class="star fa-regular fa-star" value="5"></li>
                                </span>
                                <input type="text" class="comment" placeholder="type here..">
                                <a class="submitreview fa-solid fa-arrow-right"></a>
                                <span class="comment-error error"></span>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="renderdata">
                                <?php echo $this->element('flash/rating') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>