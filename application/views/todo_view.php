<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Mijn ToDo</title>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>

<?php foreach ($todos as $todo) : ?>
    <?php echo $todo->description . ' ' . $todo->finished . '</br>'?>
<?php endforeach; ?>

</body>
</html>


