<?php

/** @var \models\Course $courses */
/** @var \models\Course $pageCount */
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
                <a href="/index.php/course/create" class="btn btn-success">Create Course</a>
            </p>
            <table class="table table-bordered mb-3">
                <thead>
                <tr>
                    <th>
                        <a class="column_sort" id="course_id" data-order="desc" href="/index.php/course/index?col=course_id&sort=desc">#</a>
                    </th>
                    <th>
                        <a class="column_sort" id="course_name" data-order="desc" href="/index.php/course/index?col=course_name&sort=desc">Name</a>
                    </th>
                    <th>
                        <a class="column_sort" id="description" data-order="desc" href="/index.php/course/index?col=description&sort=desc">Description</a>
                    </th>
                    <th>
                        <a class="column_sort" id="duration" data-order="desc" href="/index.php/course/index?col=duration&sort=desc">Duration</a>
                    </th>
                    <th>
                        <a class="column_sort" id="start_date" data-order="desc" href="/index.php/course/index?col=start_date&sort=desc">Start_date</a>
                    </th>
                    <th>
                        <a class="column_sort" id="end_date" data-order="desc" href="/index.php/course/index?col=end_date&sort=desc">End_date</a>
                    </th>
                    <th>
                        <a class="column_sort" id="teacher_id" data-order="desc" href="/index.php/course/index?col=teacher_id&sort=desc">Teacher</a>
                    </th>
                    <th>
                        <a class="column_sort" id="fee" data-order="desc" href="/index.php/course/index?col=fee&sort=desc">Fee</a>
                    </th>
                    <th>Actions</th>
                </tr>

                </thead>
                <tbody id="pagination-body">
                <?php
                foreach ($courses as $course):?>
                    <tr>
                        <td><?= $course['course_id'] ?></td>
                        <td><?= $course['course_name'] ?></td>
                        <td><?= substr($course['description'], 0, 20) ?></td>
                        <td><?= $course['duration'] ?></td>
                        <td><?= $course['start_date'] ?></td>
                        <td><?= $course['end_date'] ?></td>
                        <td><?= $course['teacher_id'] ?></td>
                        <td><?= $course['fee'] ?></td>
                        <td width="118px" style="display: flex;">
                            <a href="/index.php/course/update?id=<?= $course['course_id'] ?>" class="btn btn-info"><i
                                        class="fas fa-pen"></i></a>
                            <a href="/index.php/course/delete?id=<?= $course['course_id'] ?>" class="btn btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            <a href="/index.php/course/view?id=<?= $course['course_id'] ?>" class="btn btn-primary"><i
                                        class="fas fa-eye"></i></a>
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
                            <a class="page-link" href="/index.php/course/index?page=<?= $page ?>">
                                <?= $page ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(".column_sort").click(function (e) {
                e.preventDefault();
                let data = $(this).attr('href');
                let sort = data.substring(data.indexOf('sort=') + 5);
                let absoluteUrl = data.substring(0,data.indexOf('&'));
                let col = data.substring(data.indexOf('col') + 4,data.indexOf('&'));
                if(sort === 'asc')
                {
                    sort = 'desc';
                }else{
                    sort = 'asc';
                }
                let url = absoluteUrl + '&sort=' + sort;
                $(this).attr('href',url);
                $.ajax({
                    url:'/index.php/course/sort',
                    data:{columnName:col,sort:sort},
                    method:'GET',
                    success:function (response){
                        console.log(response)
                    }
                })
            });
        })
    </script>
<?php session_destroy(); ?>