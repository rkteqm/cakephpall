<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Alazea - Gardening &amp; Landscaping HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <?= $this->Html->css(['style', 'classy-nav', 'bootstrap.min', 'animate', 'elegant-icon', 'font-awesome.min', 'owl.carousel.min', 'magnific-popup']) ?>
    <?= $this->Html->script(['active', 'bootstrap/bootstrap.min', 'bootstrap/popper.min', 'jquery/jquery-2.2.4.min', 'plugins/plugins']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>
    <?= $this->fetch('content') ?>
</body>

</html>