<div id='container'>
    <h1>To Do Application</h1>

    <h2>Add a task :</h2>
    <?php echo form_open('create_task'); ?>
    <?php echo form_label('Task','task') . form_input('task'); ?>
    <?php echo form_submit('submit', 'Add task'); ?>
    <?php echo form_close(); ?>
</div>