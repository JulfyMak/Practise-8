<?php session_start(); ?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <h4 class="my-0 mr-md-auto font-weight-normal">User page</h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-info btn-lg" href="/pages/restricted.php">Back</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
        <h3>Account info</h3>
        <form action="" method="post">
          <label for="first_name">First name:</label>
          <br>
          <input id="first_name" class="form-control" name="first_name" type="text" value="<?php echo $_SESSION["first_name"]; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="last_name">Last name:</label>
          <br>
          <input id="last_name" class="form-control" name="last_name" type="text" value="<?php echo $_SESSION["last_name"]; ?>" minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="role_id">Id role:</label>
          <br>
          <select class="form-control" id="role_id" name="role_id">
                <option selected><?php echo $_SESSION["role_id"];?></option>
                <option >0</option>
                <option >1</option>
          </select>
          <br>
          <label for="pass">Password:</label>
          <br>
          <input id="pass" class="form-control" name="pass" type="password" minlength="6" maxlength="32">
          <br>
          <label for="pass_rep">Repeat password:</label>
          <br>
          <input id="pass_rep" class="form-control" name="pass" type="password" minlength="6" maxlength="32">
          <br><br>
          <nav class="my-2 my-md-0 mr-md-3">
              <input id="submit" class="btn btn-success btn-lg" name="submit" type="submit" value="Edit">
              <a class="btn btn-danger btn-lg" href="">Delete</a>
          </nav>
        </form>
    </section>
  </div>
</body>
