





<form class="form-horizontal" method="POST" action="controllers/admin_controller.php" style="overflow:hidden">
                    
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">title</label>
        <div class="col-sm-10">
            <input type="text" name="title" required="required" class="form-control form-control-edit" id="title" value="<?php echo $course_data->title ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="from" class="col-sm-2 control-label">from</label>
        <div class="col-sm-10">
            <input type="date" name="from" required="required" class="form-control form-control-edit" id="from" value="<?php echo $course_data->from_d ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="to" class="col-sm-2 control-label">to</label>
        <div class="col-sm-10">
            <input type="date" name="to" required="required" class="form-control form-control-edit" id="to" value="<?php echo $course_data->to_d ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="hours" class="col-sm-2 control-label">hours</label>
        <div class="col-sm-10">
            <input type="text" name="hours" required="required" class="form-control form-control-edit" id="hours" value="<?php echo $course_data->hours ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-sm-2 control-label">content</label>
        <div class="col-sm-10">
            <textarea name="content" id="content" class="form-control" style="height:70px;width:27%"><?php echo $course_data->content ?></textarea>
        </div>
    </div>
                    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type='hidden' name='course_id' value='<?php echo $course_data->id; ?>'>
            <button type="submit" name="update_course" class="btn btn-primary">update course</button>
            <a class="btn btn-danger" href="index.php">back</a>
        </div>
    </div>
</form>




