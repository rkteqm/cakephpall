<ul class="list-group">
    <?php
    if (!empty($ratings)) {
        foreach ($ratings as $rating) {
    ?>
            <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2 pt-0">
                <div class="avatar me-3">
                    <img src="/assets/img/kal-visuals-square.jpg" alt="kal" class="border-radius-lg shadow">
                </div>
                <div class="d-flex align-items-start flex-column justify-content-center">
                    <h6 class="mb-0 text-sm"><?= $rating->user_name ?></h6>
                    <p class="mb-0 text-xs"><?= $rating->review ?></p>
                </div>
                <div class="ms-4 d-flex align-items-start flex-row justify-content-center">
                    <?php
                    for ($i = 0; $i < $rating->star; $i++) {
                        echo '<i class="fa-solid fa-star"></i>';
                    }
                    for ($j = $i; $j < 5; $j++) {
                        echo '<i class="fa-regular fa-star"></i>';
                    }
                    ?>
                </div>
            </li>
    <?php
        }
    }
    ?>
</ul>