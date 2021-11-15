<?php
    include("controllers/TodoController.php");
    $TodoController = new TodoController();
    $completed_tasks = $TodoController->get_todos(0);
    $total_pagination = $TodoController->total_pagination(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>To Do List - Completed</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">To Do</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="completed.php">Completed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">Settings</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <header class="mt-5 ml-3">
                    <h2>
                        Completed Tasks
                        <span class="badge badge-pill badge-info"><?php echo count($completed_tasks);?></span>
                    </h2>
                </header>
                <div class="col-lg-12 mt-5">
                    <!-- Tasks section-->
                    <section>
                        <ul class="list-group list-group-flush">
                            <?php
                                for($x = 0;$x < count($completed_tasks);$x++){
                                    echo '
                                        <li class="list-group-item">'. $completed_tasks[$x]['todo_content'] .'</li>
                                    ';
                                }
                            ?>
                        </ul>
                    </section>
                        <?php
                            if($total_pagination > 1){
                        ?>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <?php
                                    echo ' <li class="page-item">
                                        <a class="page-link"  href="http://localhost/php-todo-ramonjr-infante-2021/completed.php?page=1">First Page</a>
                                    </li>';
                                    for($i=1;$i<=$total_pagination;$i++){
                                        // echo"<a href='auditTrailAdmin.php?page=$i'>$i</a>";
                                        echo '<li class="page-item">
                                        <a class="page-link"  href="http://localhost/php-todo-ramonjr-infante-2021/completed.php?page='.$i.'">'.$i.'</a></li>';
                                    }
                                    echo '<li class="page-item">
                                    <a class="page-link" href="http://localhost/php-todo-ramonjr-infante-2021/completed.php?page='.$total_pagination.'">Last Page</a>
                                </li> ';
                                ?>
                            </ul>
                        </nav>
                        <?php
                            }
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>