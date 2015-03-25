<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Mijn ToDo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<h1>To Do Lijst</h1>

<ul>

<!--<?php //print_r($this->session->all_userdata()) ?>   -->

<?php foreach ($todos as $todo) : ?>
    <li>
        <input type="checkbox" name="finished" value="1" <?php echo ((  $todo->finished == 1) ? 'checked="checked"' : '') ?> disabled="disabled" >
    <?php echo ' ' . $todo->description . '</br>'; ?>
    </li>
<?php endforeach; ?>

</ul>
<a href="<?php echo base_url();?>todo/create">Nieuwe Todo</a>
<p></p>
<a href="<?php echo base_url();?>login/logout">Log Uit</a>

</body>
</html>


