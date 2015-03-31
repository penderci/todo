<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>User management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<h1>User management</h1>

<?php
echo validation_errors();

echo form_open('users/submit');
echo 'Email: ';
echo form_input('email',$email);

echo '<br />';

echo 'Password: ';
echo form_input('password',$password);

echo '<br />';

echo form_submit('submit','Insert');

echo form_close();
?>



<ul>

    <!--<?php //print_r($this->session->all_userdata()) ?>   -->

    <?php foreach ($users as $user) : ?>
        <li>
            <?php echo $user->email . '</br>'; ?>
        </li>
    <?php endforeach; ?>

</ul>
<a href="<?php echo base_url();?>todo">To Do lijst</a>
<a href="<?php echo base_url();?>users">Usermanagement</a>
<p></p>
<a href="<?php echo base_url();?>login/logout">Log Uit</a>

</body>
</html>