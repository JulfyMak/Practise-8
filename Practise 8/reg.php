<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Successful registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <img src="./logo.png" class="logo" alt="CROWDME">
        <h5 class="my-0 mr-md-auto font-weight-normal"></h5>
        <nav class="my-2 my-md-0 mr-md-3">
<!--            <button type="button" class="btn btn-outline-success btn-lg" data-toggle="modal" data-target="#exampleModal">Sign In</button>-->
            <a class="btn btn-outline-success btn-lg" href="./pages/main.php">Back</a>
        </nav>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Sign In</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <section class="overlay">
                  <form action="auth.php" method="post">
                    <label for="email">Email:</label>
                    <br>
                    <input id="email" class="form-control" name="email" type="email" required minlength="3" maxlength="20">
                    <br>
                    <label for="pass">Password:</label>
                    <br>
                    <input id="pass" class="form-control" name="pass" type="password" required minlength="3" maxlength="20">
                    <br><br>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input id="submit" class="btn btn btn-success" name="submit" type="submit" value="Submit">
                  </form>
              </section>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <?php
        require_once "pages/connection.php"; // conn

        $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
        $role_id = mysqli_real_escape_string($conn, $_REQUEST['role_id']);
        $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
        $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);

      	if (count($_POST)>0) {
          $sql = "INSERT INTO users (first_name, last_name, email, password,
          role_id) VALUES ('$first_name', '$last_name', '$email', '$password', '$role_id')";

      		$res = mysqli_query($conn, $sql);

          if (!$res) {
              printf("Error: %s\n", mysqli_error($conn));
              exit();
          }
        }
    ?>
    <h3 align="center">You have been registered!</h3>
  </div>
</body>
