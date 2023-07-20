<?php

/** @var \models\Teacher  $teacher */

?>

<div class="card">
    <div class="card-body">
    <table class="table table-stripped table-bordered mb-3">
        <tbody>
            <tr>
                <th>Teacher Name</th>
                <td><?= $teacher['name'] ?></td>
            </tr>
            <tr>
                <th>Specialization</th>
                <td><?= $teacher['specialization'] ?></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td><?= $teacher['phone'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $teacher['email'] ?></td>
            </tr>
        </tbody>
    </table>
    <p>
        <a href="/index.php/teacher/update?id=<?= $teacher['teacher_id'] ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
        <a href="/index.php/teacher/delete?id=<?= $teacher['teacher_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
    </p>
</div>
</div>
