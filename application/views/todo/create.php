<?php
echo validation_errors();

echo form_open("todo/validate");

echo form_label("To Do : ","description");

$data = array(
    "name" => "description",
    "id" => "description",
    "value" => ""
);

echo form_input($data);

echo form_submit("TodoSubmit","Opslaan");


echo form_close();

?>