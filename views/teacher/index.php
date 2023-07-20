<?php

/** @var \models\Teacher $teachers */
/** @var \models\Teacher $pageCount */
?>
<div class="card">
    <div class="card-body">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error'] ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-info" role="alert">
                <?= $_SESSION['message'] ?>
            </div>
        <?php endif; ?>
        <p>
            <a href="/index.php/teacher/create" class="btn btn-success">Create Teacher</a>
        </p>
        <table class="table table-bordered mb-3">
            <thead>
            <tr>
                <th>
                    <a class="column_sort" data-order="desc" href="#">#</a>
                </th>
                <th>
                    <a class="column_sort" data-order="desc" href="#">Name</a>
                </th>
                <th>
                    <a class="column_sort" data-order="desc" href="#">Specialization</a>
                </th>
                <th>
                    <a class="column_sort" data-order="desc" href="#">Phone</a>
                </th>
                <th>
                    <a class="column_sort" data-order="desc" href="#">Email</a>
                </th>
                <th>Actions</th>
            </tr>

            </thead>
            <tbody id="pagination-body">
            <?php
            foreach ($teachers as $teacher):?>
                <tr>
                    <td><?= $teacher['teacher_id'] ?></td>
                    <td><?= $teacher['name'] ?></td>
                    <td><?= $teacher['specialization'] ?></td>
                    <td><?= $teacher['phone'] ?></td>
                    <td><?= $teacher['email'] ?></td>
                    <td width="118px" style="display: flex;">
                        <a href="/index.php/teacher/update?id=<?= $teacher['teacher_id'] ?>" class="btn btn-info"><i
                                    class="fas fa-pen"></i></a>
                        <a href="/index.php/teacher/delete?id=<?= $teacher['teacher_id'] ?>" class="btn btn-danger"><i
                                    class="fas fa-trash"></i></a>
                        <a href="/index.php/teacher/view?id=<?= $teacher['teacher_id'] ?>"
                           class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($page = 1; $page <= $pageCount; $page++): ?>
                    <li class="page-item">
                        <a class="page-link" href="/index.php/teacher/index?page=<?= $page ?>">
                            <?= $page ?>
                        </a>
                    </li>
                <?php endfor; ?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

<?php session_destroy(); ?>