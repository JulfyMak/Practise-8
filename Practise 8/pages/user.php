<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/photo.css">
<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white">
        <img src="../logo.png" class="logo" alt="CROWDME">
        <h4 class="my-0 mr-md-auto font-weight-normal"></h4>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
              session_start();
              if($_SESSION['auth']=='true' && $_SESSION['admin']=='true'){
                $url = "restricted_admin.php?id=".$_SESSION['admin_id'];
              } elseif($_SESSION['auth']=='true' ){
                $url = "restricted.php?id=".$_SESSION['id'];
              } else {
                $url = "/";
              }
            ?>
            <a class="btn btn-outline-success btn-lg" href="<?php echo $url; ?>">Back</a>
        </nav>
    </div>
  </header>
  <div class="container">
    <section class="overlay">
        <?php
          require_once('connection.php');
          $sql_user = "SELECT id, first_name, last_name, password, photo FROM users WHERE id=".$_GET['id'];
          $result_user = $conn->query($sql_user);

          if ($result_user->num_rows > 0) {
              while($row_user = $result_user->fetch_assoc()) { ?>
                <h3>Account info</h3><br>
                <img src="../public/images/<?php echo $row_user['photo']; ?>" style="width: 150px; height: 150px; object-fit:cover;
" class="rounded" alt="Place your photo">
                <form action="../upload.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                  <br> Select image to upload:<br><br>
                  <div class="custom-file">
                    <input id="fileToUpload" name="fileToUpload" type="file" class="custom-file-input" data-show-preview="false">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <br><br>
                  <input class="btn btn-sm btn-success btn-lg" type="submit" value="Upload Image" name="submit"><br>
                </form>
                <form action="../user_edit_delete.php?id=<?php echo $_GET['id']; ?>" method="post">
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
                  <br><br>
                  <nav class="my-2 my-md-0 mr-md-3">
                      <input id="submit" class="btn btn-success btn-lg" name="user_edit" type="submit" value="Edit">
                      <input id="submit" class="btn btn-danger btn-lg" name="user_delete" type="submit" value="Delete">
                  </nav>
                </form>
                <?php
              }
          }
        ?>
    </section>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
