<!DOCTYPE html>
<html lang="en">

<head>
  <title>CakePHP 4 CRUD Using Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <?php echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
  <script>
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
  </script>
  <style>
    .error {
      color: red;
    }

    #success {
      color: seagreen;
    }

    .success {
      color: seagreen;
    }
  </style>
</head>

<body>

  <div class="container" style="margin-top:50px">
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </div>

  <?php echo $this->Html->script('custom'); ?>
</body>

</html>