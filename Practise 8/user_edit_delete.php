<?php
//юзер удаляет, редактирует сам себя
    require_once "pages/connection.php"; // conn
    $first_name = mysqli_real_escape_string($conn, $_REQUEST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_REQUEST['last_name']);
    $password = mysqli_real_escape_string($conn, $_REQUEST['pass']);
    session_start();

    if (count($_POST)>0) {
      if($_POST['user_edit']){
        $sql = "UPDATE users SET first_name='$first_name', last_name='$last_name',
        password='$password' WHERE id=".$_GET['id'];
        $res = mysqli_query($conn, $sql);
        header('Location: pages/restricted.php?id='.$_SESSION['id']);
      }

      if($_POST['user_delete']){
        $sql = "DELETE FROM users WHERE id=".$_GET['id'];
        $res = mysqli_query($conn, $sql);
        header('Location: index.php');
      }

      if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
      }

    }
?>
