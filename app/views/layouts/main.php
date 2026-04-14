<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? "Document" ?></title>
    <link href="<?php echo __WEB_ROOT;?>/public/access/css/style.css" rel="stylesheet" type="text/css" />

    <?php if (!empty($css)): ?>
        <?php foreach ($css as $file): ?>
            <link href="<?php echo __WEB_ROOT;?>/public/access/css/<?php echo $file; ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>

</head>
<body>
<?php
    $this->render('layouts/header');
    $this->render($content, $subcontent);
    $this->render('layouts/footer');
    ?>

<script type="text/css" src="<?php echo __WEB_ROOT;?>/public/access/js"></script>
</body>
</html>