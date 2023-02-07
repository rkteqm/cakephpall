<!DOCTYPE html>
<html lang="en">

<head>
    <title>CakePHP 4 Image Upload Using Ajax With Form Data</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2 style="text-align: center;">CakePHP 4 Image Upload Using Ajax With Form Data</h2>
        <div class="panel panel-primary">
            <div class="panel-heading">CakePHP 4 Image Upload Using Ajax With Form Data</div>
            <div class="panel-body">

                <?= $this->Flash->render() ?>

                <form action="javascript:void(0)" id="frm-add-product" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control" class="image">
                    </div>
                    <div class="form-group">
                        <input type="number" min="0" name="cost" class="form-control" placeholder="Cost">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function() {

            // Ajax form submission with image
            $('#frm-add-product').on('submit', function(e) {

                e.preventDefault();

                var formData = new FormData(this);

                //We can add more values to form data
                //formData.append("key", "value");

                $.ajax({
                    url: "/submit-product",
                    type: "POST",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function(data) {
                        window.location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error at add data');
                    }
                });
            });
        });
    </script>

</body>

</html>