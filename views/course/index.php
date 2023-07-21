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
                <button class="btn btn-outline-success" type="button" data-toggle="collapse"
                        data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-edit"></i> Create Course
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="/index.php/course/create" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 my-2">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name="course_name">
                            </div>
                            <div class="col-lg-6 my-2">
                                <label>Duration</label>
                                <input type="text" class="form-control" name="duration">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 my-2">
                                <label>Start Date</label>
                                <input type="date" class="form-control" name="start_date"
                                       value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-lg-6 my-2">
                                <label>End Date</label>
                                <input type="date" class="form-control" name="end_date"
                                       value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 my-2">
                                <label>Teacher</label>
                                <select name="teacher_id" class="form-control">
                                    <option value="">Select teacher</option>
                                    <?php /** @var \models\Teacher $teachers */
                                    foreach ($teachers as $key => $value):?>
                                        <option value="<?= $value['teacher_id'] ?>"><?= $value['name'] ?></option>
                                    <?php endforeach; ?>
                                    <option value="11">Sanjar</option>
                                    <option value="3">Umar</option>
                                </select>
                            </div>
                            <div class="col-lg-6 my-2">
                                <label>Fee</label>
                                <input type="text" class="form-control" name="fee">
                            </div>
                        </div>
                        <div class="my-2">
                            <label>Description</label>
                            <textarea style="resize: none;" name="description" cols="5" rows="4"
                                      class="form-control"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary" name="course_create">Save</button>
                    </form>
                </div>
            </div>
            <table class="table table-bordered mb-3">
                <thead>
                <tr>
                    <th>
                        <a class="column_sort" id="course_id" data-order="desc" href="javascript:void(0)">#</a>
                    </th>
                    <th>
                        <a class="column_sort" id="course_name" data-order="desc" href="javascript:void(0)">Name</a>
                    </th>
                    <th>
                        <a class="column_sort" id="description" data-order="desc"
                           href="javascript:void(0)">Description</a>
                    </th>
                    <th>
                        <a class="column_sort" id="duration" data-order="desc" href="javascript:void(0)">Duration</a>
                    </th>
                    <th>
                        <a class="column_sort" id="start_date" data-order="desc"
                           href="javascript:void(0)">Start_date</a>
                    </th>
                    <th>
                        <a class="column_sort" id="end_date" data-order="desc" href="javascript:void(0)">End_date</a>
                    </th>
                    <th>
                        <a class="column_sort" id="teacher_id" data-order="desc" href="javascript:void(0)">Teacher</a>
                    </th>
                    <th>
                        <a class="column_sort" id="fee" data-order="desc" href="javascript:void(0)">Fee</a>
                    </th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="course_id" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="course_name" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="description" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="duration" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="start_date" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="end_date" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="teacher_id" name="search_column">
                        </form>
                    </th>
                    <th>
                        <form action="/index.php/course/filter" method="post">
                            <input type="text" class="form-control" name="search_value">
                            <input type="hidden" value="fee" name="search_column">
                        </form>
                    </th>
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
                        <td style="display: flex;">
                            <a href="/index.php/course/update?id=<?= $course['course_id'] ?>" class="btn btn-info"><i
                                        class="fas fa-pen"></i></a>
                            <a href="/index.php/course/delete?id=<?= $course['course_id'] ?>"
                               class="btn btn-danger mx-2"><i
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
                    <?php ?>
                    <?php for ($page = 1; $page <= $pageCount; $page++): ?>
                        <li class="page-item active">
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
            var getUrlParameter = function getUrlParameter(sParam) {
                var sPageURL = window.location.search.substring(1),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;

                for (i = 0; i < sURLVariables.length; i++) {
                    sParameterName = sURLVariables[i].split('=');

                    if (sParameterName[0] === sParam) {
                        return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                    }
                }
                return false;
            }

            $(".column_sort").click(function (e) {
                e.preventDefault();
                let name = $(this).text();
                let page = getUrlParameter('page');
                let sort = $(this).attr('data-order');
                let col = $(this).attr('id');
                let arrow = '';
                if (sort === 'desc') {
                    sort = 'asc';
                    arrow = '<i class="fas fa-arrow-down"></i>'
                } else {
                    arrow = '<i class="fas fa-arrow-up"></i>'
                    sort = 'desc'
                }
                $(this).attr('data-order', sort);
                $.ajax({
                    url: '/index.php/course/sort',
                    type: 'POST',
                    data: {sort: sort, columnName: col, page: page},
                    success: function (response) {
                        $("#pagination-body").html(response);
                        $('#' + col + '').html(name + ' ' + arrow)
                    }
                })
            });
        })
    </script>
<?php session_destroy(); ?>