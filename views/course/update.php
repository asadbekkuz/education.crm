<?php

/** @var \models\Course $course */
?>
<div class="card">
    <div class="card-body">
        <h1>Update Teacher</h1>
        <form method="post">
            <div class="mb-3">
                <label for="teacherNameInput" class="form-label">Course Name</label>
                <input type="hidden" name="course_id" value="<?= $course['course_id'] ?>">
                <input type="text" name="course_name" class="form-control" id="teacherNameInput" value="<?= $course['course_name'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherSpecializationInput" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="teacherSpecializationInput" value="<?= $course['description'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherPhoneInput" class="form-label">Duration</label>
                <input type="text" name="duration" class="form-control" id="teacherPhoneInput" value="<?= $course['duration'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">Start Date</label>
                <input type="date" name="start_date" class="form-control" id="teacherEmailInput" value="<?= $course['start_date'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">End Date</label>
                <input type="date" name="end_date" class="form-control" id="teacherEmailInput" value="<?= $course['end_date'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">Teacher ID</label>
                <input type="text" name="teacher_id" class="form-control" id="teacherEmailInput" value="<?= $course['teacher_id'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">Fee</label>
                <input type="text" name="fee" class="form-control" id="teacherEmailInput" value="<?= $course['fee'] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="course_update">Submit</button>
        </form>
    </div>
</div>