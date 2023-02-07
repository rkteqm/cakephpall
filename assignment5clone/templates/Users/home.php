<div class="container">
    <div class="cars index content">
        <?= $this->Form->create(null, ['type' => 'get', 'class' => 'float-left', 'id' => 'searchform']) ?>
        <?= $this->Form->control('key', ['label' => 'Cars', 'placeholder' => 'Search', 'value' => $this->request->getQuery('key'), 'id' => 'searchBox']) ?>
        <?= $this->Form->submit('search', ['type' => 'hidden', 'id' => 'rahulsearch']) ?>
        <?= $this->Form->end() ?>
        <div class="table-responsive">
            <div class="container">
                <?php foreach ($cars as $car) : ?>
                    <div class="row">
                        <div class="container float-left">
                            <table>
                                <tr>
                                    <td><?= $this->Html->image(h($car->image), array('width' => '400px')) ?></td>
                                </tr>
                                <tr>
                                    <td><?= $this->Html->link(__('Click here for more details'), ['action' => 'view', $car->id]) ?><i class="fa-solid fa-arrow-right"></i></td>
                                    <td class="test"><?= $this->Html->link(__('Click here for more details'), [$car->id]) ?><i class="fa-solid fa-arrow-right"></i></td>
                                    <input type="hidden" value="<?= $car->id ?>">
                                </tr>
                            </table>
                        </div>
                        <div class="container float-right  homebackgroud">
                            <table>
                                <tr>
                                    <th><?= __('Company') ?></th>
                                    <td><?= h($car->company) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Brand') ?></th>
                                    <td><?= h($car->brand) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Model') ?></th>
                                    <td><?= h($car->model) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Make') ?></th>
                                    <td><?= h($car->make) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Color') ?></th>
                                    <td><?= h($car->color) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Description') ?></th>
                                    <td><?= h($car->description) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        $('.test').click(function(e) {
            e.preventDefault();
            var car_id = $(this).next('input').val();
            $.ajax({
                // headers: {
                //     'X-CSRF-Token': $('[name="_csrfToken"]').val()
                // },
                // evalScripts: true,
                // async: true,
                url: "/test",
                type: "JSON",
                method: "POST",
                data: {
                    'id': car_id,
                    'status': true,
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    var company = data['car']['company'];
                    console.log(data);
                    // console.log(data['status']);
                    // console.log(company);
                }
            });
        });
    });
</script>