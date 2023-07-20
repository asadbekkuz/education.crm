<?php

?>

<div class="card">
    <div class="card-body">
    <form method="post">
        <div class="mb-3">
            <label for="teacherNameInput" class="form-label">Teacher Name</label>
            <input type="text" name="name" class="form-control" id="teacherNameInput" value="<?= $teacher['name'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="teacherSpecializationInput" class="form-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" id="teacherSpecializationInput"
                   value="<?= $teacher['specialization'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="teacherPhoneInput" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="teacherPhoneInput" value="<?= $teacher['phone'] ?? '' ?>">
        </div>
        <div class="mb-3">
            <label for="teacherEmailInput" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="teacherEmailInput" value="<?= $teacher['email'] ?? '' ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="teach_create">Submit</button>
    </form>
</div>
</div>
