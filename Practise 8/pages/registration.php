<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../assets/js/validate.js"> </script>
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <img src="../logo.png" class="logo" alt="CROWDME">
        <h3 class="my-0 mr-md-auto font-weight-normal"></h3>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-success btn-lg" href="main.php">Back</a>
        </nav>
    </div>
  </header>

  <div class="container">
    <section class="overlay">
        <h3>Sign Up</h3>
        <form id="forms" action="../reg.php" method="post">
          <label for="first_name">First name:</label>
          <br>
          <input id="first_name" class="form-control" name="first_name" type="text" required minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="last_name">Last name:</label>
          <br>
          <input id="last_name" class="form-control" name="last_name" type="text" required minlength="2" maxlength="20" pattern="[a-zA-Z]+">
          <br>
          <label for="role_id">Id role (0 - user, 1 - admin):</label>
          <br>
          <select class="form-control" id="role_id" name="role_id" required>
                <option>0</option>
                <option>1</option>
          </select>
          <br>
          <label for="login">Email:</label>
          <br>
          <input id="email" class="form-control" name="email" type="email" required minlength="3" maxlength="32">
          <br>
          <label for="pass">Password:</label>
          <br>
          <input id="pass" class="form-control" name="pass" type="password" required minlength="6" maxlength="32">
          <br>
            <label for="pass_conf">Password Confirm:</label>
            <br>
            <input id="pass_conf" class="form-control" name="pass_conf" type="password" required minlength="6" maxlength="32">
            <br>
          <input id="submit" class="btn btn-lg btn-success btn-lg" name="submit" type="submit" required value="Submit">
        </form>
    </section>
  </div>
</body>

<script src="../assets/js/validate.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</html>
