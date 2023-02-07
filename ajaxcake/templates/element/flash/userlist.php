<div class="panel-body">

<table id="tbl-students-list" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone No</th>
            <th>Action</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="aidata">
        <?php
        if (count($students) > 0) {
            foreach ($students as $index => $data) {
        ?>
                <tr>
                    <td><?= $data->id ?></td>
                    <td><?= $data->name ?></td>
                    <td><?= $data->email ?></td>
                    <td><?= $data->phone_no ?></td>
                    <td>
                        <a href="<?= $this->Url->build('/edit-student/' . $data->id, ['fullBase' => true]) ?>" class="btn btn-warning">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-delete-student" data-id="<?= $data->id ?>">Delete</a>
                        <!-- <a href="" class="btn btn-success test" data-id="<?= $data->id ?>">View</a> -->
                    </td>
                    <td class="txtcenter">
                        <label class="switch">
                            <input type="hidden" value="<?= $data->id ?>">
                            <input type="checkbox" value="<?= $this->Number->format($data->status) ?>" <?php echo ($data->status == 1) ? 'checked' : '' ?> class="inac">
                            <span class="slider round"></span>
                        </label>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>
</div>