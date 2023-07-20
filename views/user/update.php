<?php

/** @var \models\User $user */
?>
<div class="card">
    <div class="card-body">
        <h1>Update User</h1>
        <form method="post">
            <div class="mb-3">
                <label for="teacherNameInput" class="form-label">Username</label>
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="text" name="username" class="form-control" id="teacherNameInput"
                       value="<?= $user['username'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherSpecializationInput" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="teacherSpecializationInput"
                       value="<?= $user['confirm'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherPhoneInput" class="form-label">Confirm</label>
                <input type="text" name="confirm" class="form-control" id="teacherPhoneInput"
                       value="<?= $user['confirm'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="teacherEmailInput"
                       value="<?= $user['email'] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="user_update">Submit</button>
        </form>
    </div>
</div>