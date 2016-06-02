

                <form class="form-horizontal" method="POST" action="controllers/course_controller.php">
                    <input type="hidden" name="id" value="<?php echo $course->id; ?>">
                    <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" required="required" class="form-control form-control-edit" id="title">
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="score" class="col-sm-2 control-label">score</label>
                        <div class="col-sm-10">
                            <input type="text" name="score" required="required" class="form-control form-control-edit" id="hours">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="desc_task" class="col-sm-2 control-label">description</label>
                        <div class="col-sm-10">
                            <textarea name="desc_task"  id="content" class="form-control" style="height:70px;width:27%"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="insert_task" class="btn btn-default">add task</button>
                            <a class="btn btn-danger" href="index.php?p=course&&cid=<?php echo $course->id; ?>">back</a>
                        </div>
                    </div>
                </form>


