<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Users info</title>
    <link rel="stylesheet" href="../assets/css/tack.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <img src="../logo.png" class="logo" alt="CROWDME">
        <h4 class="my-0 mr-md-auto font-weight-normal"> </h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php $url = "/";
            if($_SESSION['auth']=='true' && $_SESSION['admin']=='true'){
              $url = "restricted_admin.php?id=".$_SESSION['admin_id'];
            } elseif($_SESSION['auth']=='true' ){
              $url = "restricted.php?id=".$_SESSION['id'];
            } else {
              $url = "main.php";
            }
            ?>
            <a class="btn btn-outline-success btn-lg" href="<?php echo $url; ?>">Back</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
      <?php
      if ($_SESSION['admin']=='false'):
      ?>
      <?php
        require_once "connection.php";

        $sql = "SELECT * FROM users ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <h3>Account info</h3>
                <label for="id" class="userid">Id:</label>
                <br>
                <input id="id" class="form-control" name="id" type="text" value="<?php echo $row['id']; ?>" minlength="1" maxlength="30">
                <br>
                <label for="first_name">First name:</label>
                <br>
                <input id="first_name" class="form-control" name="first_name" type="text" value="<?php echo $row['first_name']; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                <br>
                <label for="last_name">Last name:</label>
                <br>
                <input id="last_name" class="form-control" name="last_name" type="text" value="<?php echo $row["last_name"]; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                <br>

                <?php
            }
        }
          ?>
      <?php endif?>
      <?php
      if ($_SESSION['admin']=='true'):
      ?>
        <?php
          require_once "connection.php";
          $sql_user = "SELECT * FROM users ";
          $result_user = $conn->query($sql_user);

          if ($result_user->num_rows > 0) {
              while($row_user = $result_user->fetch_assoc()) { ?>
                <h3>Account info</h3>
                <form action="edit_delete.php" method="post">
                  <label for="id">Id:</label>
                  <br>
                  <input id="id" class="form-control" name="id" type="text" value="<?php echo $row_user['id']; ?>" minlength="1" maxlength="30">
                  <br>
                  <label for="first_name">First name:</label>
                  <br>
                  <input id="first_name" class="form-control" name="first_name" type="text" value="<?php echo $row_user['first_name']; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                  <br>
                  <label for="last_name">Last name:</label>
                  <br>
                  <input id="last_name" class="form-control" name="last_name" type="text" value="<?php echo $row_user["last_name"]; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
                  <br>
                  <label for="pass">Password:</label>
                  <br>
                  <input id="pass" class="form-control" name="pass" type="text" value="<?php echo $row_user["password"]; ?>" minlength="6" maxlength="32">
                  <br>
                  <label for="email">Email:</label>
                  <br>
                  <input id="email" class="form-control" name="email" type="text" value="<?php echo $row_user["email"]; ?>"minlength="6" maxlength="32">
                  <br>
                  <label for="role_id">Role id (0 - user, 1 - admin):</label>
                  <br>
                  <input id="role_id" class="form-control" name="role_id" type="text" value="<?php echo $row_user["role_id"]; ?>"minlength="1" maxlength="1">
                  <br><br>
                  <nav class="my-2 my-md-0 mr-md-3">
                      <input id="submit" class="btn btn-success btn-lg" name="edit" type="submit" value="Edit">
                      <input id="submit" class="btn btn-danger btn-lg" name="delete" type="submit" value="Delete">
                  </nav>
                </form>
                <?php
              }
          }
        ?>
      <?php endif?>

    </section>
  </div>
</body>
