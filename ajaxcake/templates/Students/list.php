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
    <?= $this->element('flash/userlist') ?>
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



        $('#statusai').change(function(e) {
            e.preventDefault();
            var status = $(this).val();
            $.ajax({
                url: "/list",
                type: "JSON",
                method: "POST",
                data: {
                    'status': status,
                },
                success: function(response) {
                    $('.panel-body').html('');
                    $('.panel-body').append(response);
                    
                }
            });
        });
    });
</script>