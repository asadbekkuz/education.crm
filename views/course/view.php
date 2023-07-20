<?php

/** @var \models\Course  $course */

?>

<div class="card">
    <div class="card-body">
    <table class="table table-stripped table-bordered mb-3">
        <tbody>
            <tr>
                <th>Course Name</th>
                <td><?= $course['course_name'] ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?= $course['description'] ?></td>
            </tr>
            <tr>
                <th>Duration</th>
                <td><?= $course['duration'] ?></td>
            </tr>
            <tr>
                <th>Start Date</th>
                <td><?= $course['start_date'] ?></td>
            </tr>
            <tr>
                <th>End Date</th>
                <td><?= $course['end_date'] ?></td>
            </tr>
            <tr>
                <th>Teacher ID</th>
                <td><?= $course['teacher_id'] ?></td>
            </tr>
            <tr>
                <th>Fee</th>
                <td><?= $course['fee'] ?></td>
            </tr>
        </tbody>
    </table>
    <p>
        <a href="/index.php/course/update?id=<?= $course['course_id'] ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
        <a href="/index.php/course/delete?id=<?= $course['course_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
    </p>
</div>
</div>