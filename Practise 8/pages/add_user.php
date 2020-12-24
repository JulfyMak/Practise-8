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
        <img src="../logo.png" class="logo" alt="CROWDME">
        <h4 class="my-0 mr-md-auto font-weight-normal"> </h4>
        <h4 class="my-0 mr-md-auto font-weight-normal"> </h4>
        <h4 class="my-0 mr-md-auto font-weight-normal"> </h4>
        <a class="my-0 mr-md-left font-weight-normal btn btn-outline-success btn-lg" href="restricted_admin.php?id=<?php echo $_GET['id']; ?>">Back</a>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
        <h3>Adding user</h3>
        <form action="../add.php?id=<?php echo $_GET['id']; ?>" method="post">
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
          <input id="pass" class="form-control" name="pass" type="text" required minlength="6" maxlength="32">
          <br><br>
          <input id="submit" class="btn btn-success btn-lg" name="submit" type="submit" value="Submit">
        </form>
    </section>
  </div>
</body>
