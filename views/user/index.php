<?php

/** @var \models\User $users */
/** @var \models\User $pageCount */
?>
<div class="card">
    <div class="card-body">
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['error'] ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-info" role="alert">
                <?= $_SESSION['message'] ?>
            </div>
        <?php endif; ?>
        <p>
            <a href="/index.php/user/create" class="btn btn-success">Create User</a>
        </p>
        <table class="table table-bordered mb-3">
            <thead>
            <tr>
                <th>
                    <a  class="column_sort" data-order="desc" href="#">#</a>
                </th>
                <th>
                    <a  class="column_sort" data-order="desc" href="#">Username</a>
                </th>
                <th>
                    <a  class="column_sort" data-order="desc" href="#">Email</a>
                </th>
                <th>Actions</th>
            </tr>

            </thead>
            <tbody id="pagination-body">
            <?php
            foreach ($users as $user):?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td width="118px" style="display: flex;">
                        <a href="/index.php/user/update?id=<?= $user['id'] ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
                        <a href="/index.php/user/delete?id=<?= $user['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="/index.php/user/view?id=<?= $user['id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <?php for ($page=1; $page <= $pageCount; $page++):?>
                    <li class="page-item">
                        <a class="page-link"  href="/index.php/user/index?page=<?= $page ?>">
                            <?= $page ?>
                        </a>
                    </li>
                <?php endfor;?>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>

<?php session_destroy(); ?>