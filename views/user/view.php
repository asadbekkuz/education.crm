<?php

/** @var \models\User  $user */

?>

<div class="card">
    <div class="card-body">
        <table class="table table-stripped table-bordered mb-3">
            <tbody>
            <tr>
                <th>Username</th>
                <td><?= $user['username'] ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?= $user['confirm'] ?></td>
            </tr>
            <tr>
                <th>Confirm</th>
                <td><?= $user['confirm'] ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?= $user['email'] ?></td>
            </tr>
            </tbody>
        </table>
        <p>
            <a href="/index.php/user/update?id=<?= $user['id'] ?>" class="btn btn-info"><i class="fas fa-pen"></i></a>
            <a href="/index.php/user/delete?id=<?= $user['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </p>
    </div>
</div>

