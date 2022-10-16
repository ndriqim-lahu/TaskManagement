<?php
    session_start();
    require_once "./util.php";

    // check user if isn't logged-in and then redirect to login.php
    if(!isUserLoggedIn() && !isset($_SESSION['full_name'])) {
        header("Location: ./login.php");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <!-- Primary Meta Tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <meta name="title" content="Task Management Tool - Task List page" />
      <meta name="description" content="Task Management Tool is tool for
      managing daily task, personal task, work task and more,
      also the tool is simple and easy to use in any time." />
      <meta name="author" content="Ndriçim Lahu" />

      <title>Task Management Tool | Task List</title>

      <!-- Favicons -->
      <link href="../assets/favicon/android-chrome-192x192.png" rel="android-chrome-icon" />
      <link href="../assets/favicon/android-chrome-512x512.png" rel="android-chrome-icon" />
      <link href="../assets/favicon/apple-touch-icon.png" rel="apple-touch-icon" />
      <link href="../assets/favicon/favicon-16x16.png" rel="icon" />
      <link href="../assets/favicon/favicon-32x32.png" rel="icon" />
      <link href="../assets/favicon/favicon.ico" rel="icon" />

      <!-- Icon Pack -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

      <!-- Font Pack -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

      <!-- Custom CSS -->
      <link rel="stylesheet" href="../css/tasklist.css" />

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
      <!-- Navigation -->
      <nav
        class="navbar navbar-expand-lg navbar-light fixed-top py-3 bg-dark"
        id="mainNav"
      >
        <div class="container px-4 px-lg-5">
          <a class="navbar-brand text-white" href="../index.html">Task Management Tool</a>
          <button
            class="navbar-toggler navbar-toggler-right"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto my-2 my-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" href="../index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./taskadd.php">Add Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./tasklist.php">Task List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="./signout.php">Signout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <center>
          <br><br><br><br>
          <h4>
              <b>Task List</b>
          </h4>
          <br><br>
          Welcome <h5><b><?php echo $_SESSION['full_name'] ?></b></h5>
          <hr width="300">
          <br><br>
          <?php
              $id = $_SESSION['id'];
              $tasks = getTaskFromDatabase();

              if (empty($tasks)) {
                  ?>
                      <div>
                          <br>
                          <h5>No task has been found!</h5>
                      </div>
                  <?php
              } else {
                  foreach ($tasks as $task) {
                  ?>
                  <div class="container">
                  <div class="row justify-content-center">
                  <table class="table">
                  <thead>
                      <tr>
                      <td>
                          <b>Title:</b> <?php echo $task['title']; ?><br>
                          <b>Description:</b> <?php echo $task['description']; ?><br>
                          <b>Status:</b> <?php echo $task['status']; ?>
                      </td>
                      <td>
                      <a id="task_delete" class="btn btn-danger btn-lg" href="./taskdelete_api.php?delete=<?php echo $task['id_task']; ?>">DELETE</a></a>
                      <select id="task_status" name="status">
                        <option value="todo">ToDo</option>
                        <option value="inprogress">InProgress</option>
                        <option value="done">Done</option>
                      </select>
                  </td>
                  </tr>
              </thead>
              </div>
              </div>
              <?php
                  }
              }
          ?>
      </center>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  </body>
</html>