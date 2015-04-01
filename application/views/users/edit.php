<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Update user</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<h1>Update user</h1>

<?php
echo validation_errors();

echo form_open('users/update');
echo 'Email: ';
echo form_input('email',$email);

echo '<br />';

echo 'New Password: ';
echo form_input('password',$password);

echo '<br />';

echo form_submit('submit','Update');

if (isset($id)){
    echo form_hidden('id',$id);
}

echo form_close();
?>


<a href="<?php echo base_url();?>todo">To Do lijst</a>
<a href="<?php echo base_url();?>users">Usermanagement</a>
<p></p>
<a href="<?php echo base_url();?>login/logout">Log Uit</a>

</body>
</html>