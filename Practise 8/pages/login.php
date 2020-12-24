<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Login page</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <h5 class="my-0 mr-md-auto font-weight-normal">Login</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="btn btn-outline-success btn-lg" href="/pages/login.php">Sign In</a>
            <a class="btn btn-outline-success btn-lg" href="/pages/registration.php">Sign Up</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
        <h3>Sign In</h3>
        <form action="../auth.php" method="post">
          <label for="email">Email:</label>
          <br>
          <input id="email" class="form-control" name="email" type="email" required minlength="3" maxlength="20">
          <br>
          <label for="pass">Password:</label>
          <br>
          <input id="pass" class="form-control" name="pass" type="password" required minlength="3" maxlength="20">
          <br><br>
          <input id="submit" class="btn btn-lg btn-success btn-lg" name="submit" type="submit" value="Submit">
        </form>
    </section>
  </div>
</body>
</html>
