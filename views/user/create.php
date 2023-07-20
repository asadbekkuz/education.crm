<?php

/** @var \models\User $user */
?>

<div class="card">
    <div class="card-body">
        <form method="post">
            <div class="mb-3">
                <label for="teacherNameInput" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="teacherNameInput" value="<?= $user['username'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherSpecializationInput" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="teacherSpecializationInput"
                       value="<?= $user['password'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherPhoneInput" class="form-label">Confirm</label>
                <input type="password" name="confirm" class="form-control" id="teacherPhoneInput" value="<?= $user['confirm'] ?? '' ?>">
            </div>
            <div class="mb-3">
                <label for="teacherEmailInput" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="teacherEmailInput" value="<?= $user['email'] ?? '' ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="user_create">Submit</button>
        </form>
    </div>
</div>

