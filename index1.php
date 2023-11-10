<?php
    include('backend/database/connection.php');
    session_start();
    if (!isset($_SESSION['user'])) {
        die("<h1>Please <a href='pages/login-page.php'>Login</a> first!</h1>");
    }
    $user = $_SESSION['user'];
    $query = "SELECT * FROM $user[1]";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $tasks = $result->fetch_all();
    // var_dump($tasks);
    // die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title>To Do List</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="icon" href="img/download.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script/jquery.dataTables.min.js"></script>
    <script src="script/script.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable for each table with class "data-table"
            $(".data-table").each(function (_, table) {
                $(table).DataTable();
            });

            // Hide DataTable elements (length and filter inputs)
            $("#example_length, #example_filter").hide();

            $(".page").hide();
            $("#home").show();
            $(".nav-link").click(function (e) {
                e.preventDefault();
                const target = $(this).attr("href");
                $(".page").hide();
                const $navLinks = $(".nav-link");
                $navLinks.removeClass("active");
                $(this).addClass("active");
                $(target).show();
                toggleIcons(target)
            });

        });
    </script>
    <script>
        // Get all the nav-links
        const navLinks = document.querySelectorAll('.nav-link');

        // Add click event listeners to each nav-link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Remove the 'active' class from all links
                navLinks.forEach(link => {
                    link.classList.remove('active');
                });
                // Add the 'active' class to the clicked link
                link.classList.add('active');
            });
        });
    </script>
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.7/b-2.4.2/datatables.min.css" rel="stylesheet">
    <!-- <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/b-2.4.2/datatables.min.js"></script> -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a id="source_code" class="navbar-brand" href="https://github.com/JatinKevlani/to_do_list.git"><i
                    class="bi bi-card-checklist"></i> To Do List</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#content">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="content">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home"><i class="icon bi bi-house-door"></i><i
                                class="icon-fill bi bi-house-door-fill"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about"><i class="icon bi bi-info-circle"></i><i
                                class="icon-fill bi bi-info-circle-fill"></i>
                            About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="icon bi bi-envelope"></i><i
                                class="icon-fill bi bi-envelope-fill"></i>
                            Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#" class="nav-link"><i class="bi bi-person"></i> Profile</a></li>
                    <li class="nav-item"><a href="../backend/logout.php" class="nav-link"><i class="bi bi-box-arrow-in-left"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div id="home" class="row page" style="margin-top: 40px;">
            <div class="col-10 offset-1">
                <div class="container pt-5 ">
                    <div class="row">
                        <div class="col-10">
                            <p class="d-flex justify-content-center display-3">TASKS</p>
                        </div>
                        <div class="col-2">
                            <div class="d-flex flex-column align-items-stretch">
                                <button class="btn bg-dark text-white mb-2">
                                    <span><i class="bi bi-plus"></i></span> Add
                                </button>
                                <button class="btn bg-danger text-white" onclick="delete_all();">
                                    <span><i class="bi bi-trash"></i></span> Delete All
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped data-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th data-sort="true" class="col-1">Serial&nbsp;No.</th>
                                    <th data-sort="true" class="col-3">Title</th>
                                    <th data-sort="true" class="col-5">Description</th>
                                    <th data-sort="true" class="col-3">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $count = 0;
                                    foreach ($tasks as $task) {
                                        $count++;
                                        if ($task[3] == "0") {
                                            echo "
                                                <tr>
                                                    <td>$count</td>
                                                    <td>$task[1]</td>
                                                    <td>$task[2]</td>
                                                    <td>
                                                        <div class='d-flex flex-row'>
                                                            <button style='margin:0px 10px;' class='btn btn-success' onclick='mark_done($task[0])'>
                                                                <div class='d-flex flex-row'>
                                                                    <i class='bi bi-check-circle' style='padding-right: 5px;'></i>
                                                                    Mark&nbsp;Done
                                                                </div>
                                                            </button>
                                                            <button style='margin:0px 10px;' class='btn btn-primary'>
                                                                <div class='d-flex flex-row'>
                                                                    <i class='bi bi-pencil' style='padding-right: 5px;'></i> Edit
                                                                </div>
                                                            </button>
                                                            <button style='margin:0px 10px;' class='btn btn-warning' onclick='delete_task($task[0]);'>
                                                                <div class='d-flex flex-row'>
                                                                    <i class='bi bi-trash' style='padding-right: 5px;'></i> Delete
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            ";
                                        } else {
                                            echo "
                                                <tr>
                                                <td><s>$count</s></td>
                                                <td><s>$task[1]</s></td>
                                                <td><s>$task[2]</s></td>
                                                <td>
                                                    <div class='d-flex flex-row'>
                                                        <button style='margin:0px 10px;' class='btn btn-success' onclick='mark_not_done($task[0])'>
                                                            <div class='d-flex flex-row'>
                                                                <i class='bi bi-check-circle' style='padding-right: 5px;'></i>
                                                                Mark&nbsp;as&nbsp;not&nbsp;done
                                                            </div>
                                                        </button>
                                                        <button style='margin:0px 10px;' class='btn btn-primary'>
                                                            <div class='d-flex flex-row'>
                                                                <i class='bi bi-pencil' style='padding-right: 5px;'></i> Edit
                                                            </div>
                                                        </button>
                                                        <button style='margin:0px 10px;' class='btn btn-warning' onclick='delete_task($task[0]);'>
                                                            <div class='d-flex flex-row'>
                                                                <i class='bi bi-trash' style='padding-right: 5px;'></i> Delete
                                                            </div>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            ";
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="about" class="row page" style="margin-top: 40px;">
            <pre class="display-2">rererer</pre>
        </div>
        <div id="contact" class="row page" style="margin-top: 40px;">
            <pre class="display-2">rersssssserer</pre>
        </div>
        <div style="display: none;">
            <form action="backend/deletetask.php" method="post" id="deleteTask">
                <textarea name="taskID" id="taskID" cols="30" rows="10"></textarea>
            </form>
        </div>
        <div style="display: none;">
            <form action="backend/markdone.php" method="post" id="markDone">
                <textarea name="taskDONEID" id="taskDONEID" cols="30" rows="10"></textarea>
            </form>
        </div>
        <div style="display: none;">
            <form action="backend/marknotdone.php" method="post" id="markNotDone">
                <textarea name="taskNOTDONEID" id="taskNOTDONEID" cols="30" rows="10"></textarea>
            </form>
        </div>
    </main>
    
    <script src="script/tasks_funcs.js"></script>
</body>

</html>