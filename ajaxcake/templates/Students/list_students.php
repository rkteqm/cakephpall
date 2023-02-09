<h3>Fetching data using ajax in JSON format</h3>
<div class="panel panel-primary">
  <div class="panel-heading">
    List Students
    <?php
    echo $this->Form->select(
      'status',
      [
        'empty' => 'All Users',
        '1' => 'Active Users',
        '0' => 'Inactive Users',
      ],
      ['id' => 'statusai', 'class' => 'btn btn-success active'],
    );
    echo $this->Html->link(
      'Add Student',
      '/add-student',
      ['class' => 'btn btn-warning pull-right', 'style' => 'margin-top:-7px']
    );
    ?>
  </div>
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
</div>



<script>
  $(document).ready(function() {
    $('.inac').click(function() {
      var status = $(this).val();
      var id = $(this).prev('input').val();
      $.ajax({
        url: "/status",
        type: "JSON",
        method: "POST",
        data: {
          'id': id,
          'status': status,
        },
        success: function(response) {}
      });
    });



    $('#statusai').change(function() {
      var status = $(this).val();
      $.ajax({
        url: "/list-students",
        type: "JSON",
        method: "POST",
        data: {
          'status': status,
        },
        success: function(response) {
          $('.aidata').html('');
          var data = JSON.parse(response);
          $.each(data['students'], function(key, value) {
            var html = '<tr>';
            html += '<td>' + value.id + '</td>';
            html += '<td>' + value.name + '</td>';
            html += '<td>' + value.email + '</td>';
            // html += '<td class="txtcenter"><label class="switch"><input type="hidden" value="' + value.id + '"><input type="checkbox" value="' + value.status + '" ' + (value.status == 1) ? "checked" : "" + ' class="inac"><span class="slider round"></span></label></td></tr>';
            html += '<td>' + value.phone_no + '</td>';
            html += '<td>' + value.id + '</td>';
            html += '<td>' + value.status + '</td>';
            $('.aidata').prepend(html);
          });
        }
      });
    });
  });
</script>