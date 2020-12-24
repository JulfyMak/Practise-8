<?php
  session_start();
  require_once "connection.php";
  $sql_user = "SELECT id, first_name FROM users WHERE id=".$_GET['id'];

  $result_user = $conn->query($sql_user);
  $name = "";
  if ($result_user->num_rows > 0) {
      while($row_user = $result_user->fetch_assoc()) {
        $name = $row_user['first_name'];
      }
  }
?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>User page</title>
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../assets/css/tack.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<header>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
      <img src="../logo.png" class="logo" alt="CROWDME">
    <h5 class="my-0 mr-md-auto font-weight-normal"> </h5>
      <nav class="my-2 my-md-0 mr-md-3">
          <a class="btn btn-outline-success btn-lg" href="user.php?id=<?php echo $_GET['id']; ?>"><?php echo $name; ?></a>
          <a class="btn btn-outline-danger btn-lg" href="../logout.php">Sign Out</a>
      </nav>
  </div>
</header>
<div class="container">
    <h3 align="center">All users</h3>
    <table id="users_table">
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Role</th>
      <!-- <th>Photo</th> -->
    </tr>
    <?php
    if ($_SESSION["auth"]=='true'):
    ?>
    <?php
    require_once "connection.php";
    $sql = "SELECT * FROM users u LEFT JOIN roles r ON u.role_id = r.role_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>";
            $url = "user_view.php?id=".$row['id'];
    ?>
          <a href="<?php echo $url; ?>".php">
          <?php
            echo $row['id'];
          ?>
          </a>
    <?php
          echo "</td>";
          echo "<td>".$row['first_name']." "."</td>";
          echo "<td>".$row['last_name']." "."</td>";
          echo "<td>".$row['email']." "."</td>";
          echo "<td>".$row['role_id']." "."</td>";
         // echo "<td>"."<img  width =30% src=../public/images/".$row['photo']."></td>";
          echo "</tr><br>";
        }
      }
    ?>
      </table>
    <br>
    <a class="btn btn-outline-success btn-lg" href="add_user.php?id=<?php echo $_GET['id']; ?>">Add user</a>
    <?php
    else:
    ?>
        <h3>Incorrect password or login, please try one more time!</h3><br>
        <a class="btn btn-lg btn-danger btn-lg" href="login.php">Return</a>

    <?php endif?>
    <br>
</div>
</body>
</html>
