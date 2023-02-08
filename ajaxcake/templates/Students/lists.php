<h3>Fetching data using ajax and flash element render</h3>
<div class="panel panel-primary">
    <div class="panel-heading">
        List Students
        <?php
        echo $this->Form->select(
            'status',
            [
                'null' => 'All Users',
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
    <div class="myapp">
        <?php echo $this->element('flash/userlist') ?>
    </div>
</div>



<script>
    $(document).ready(function() {


        $('body').on('click', '.inac', function() {
            var status = $(this).val();
            if (status == 1) {
                $(this).val('0');
            } else {
                $(this).val('1');
            }
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
                }
            });
            // e.preventDefault();
            var status = $(this).val();
            $.ajax({
                url: "/lists",
                type: "JSON",
                method: "GET",
                data: {
                    'status': status,
                },
                success: function(response) {
                    $('.myapp').html('');
                    $('.myapp').append(response);
                }
            });
        });
    });
</script>