<?php

/** @var \models\Teacher $teachers */

?>

<div class="card">
    <div class="card-body">
    <h3>Create a course</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="my-2">
            <label>Course Name</label>
            <input type="text" class="form-control"  name="course_name">
        </div>
        <div class="my-2">
            <label>Description</label>
            <textarea name="description" cols="5" rows="4" class="form-control"></textarea>
        </div>
        <div class="my-2">
            <label>Duration</label>
            <input type="text" class="form-control"  name="duration">
        </div>
        <div class="my-2">
            <label>Start Date</label>
            <input type="date" class="form-control"  name="start_date">
        </div>
        <div class="my-2">
            <label>End Date</label>
            <input type="date" class="form-control"  name="end_date">
        </div>
        <div class="my-2">

            <select name="teacher_id" class="form-control">
                <option value="">Select teacher</option>
                <?php foreach ($teachers as $key => $value):?>
                    <option value="<?= $value['teacher_id'] ?>"><?= $value['name'] ?></option>
                <?php endforeach;?>
                <option value="2">Sanjar</option>
                <option value="3">Umar</option>
            </select>
        </div>
        <div class="my-2">
            <label>Fee</label>
            <input type="text" class="form-control"  name="fee">
        </div>
        <button type="submit" class="btn btn-primary" name="course_create">Create</button>
    </form>
</div>
</div>