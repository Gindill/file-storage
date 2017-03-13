<?php
/* @var $this Template */
/* @var $content string */
$this->registerCssFile("/assets/css/bootstrap.css");
$this->registerCssFile("/assets/css/style.css");

$this->registerJSFile('https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js');
$this->registerJSFile('/assets/js/bootstrap.min.js');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->title ?></title>

    <?= $this->head() ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?= $this->header() ?>
<?= $content ?>
<?= $this->endBody() ?>
</body>
</html>
