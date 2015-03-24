<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div id="container">
<h1>Login</h1>

    <?php

    echo form_open('login/login_validation');

    echo('<p>Email');
    echo form_input('email');
    echo('</p>');

    echo('<p>Paswoord');
    echo form_password('password');
    echo('</p>');

    echo('<p>');
    echo form_submit('login_submit','Login');
    echo('</p>');

    echo form_close();

    ?>

</div>

</body>
</html>
