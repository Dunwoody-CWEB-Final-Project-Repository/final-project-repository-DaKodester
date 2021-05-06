<?php
  session_start();
//Database Configuration File
include('../config/database.php');
error_reporting(0);

  if(isset($_POST['login']))
  {

    // Getting username/ email and password
    $email=$_POST['email'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql ="SELECT email,ad_password FROM admin WHERE (email=:useremail)";
    $query= $con -> prepare($sql);
    $query-> bindParam(':useremail', $email, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
    foreach ($results as $row) {
    $userpass=$row->ad_password;
    }
    //verifying Password
    if (password_verify($password, $userpass)) {
    $_SESSION['userlogin']=$_POST['email'];
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
    echo "<script>alert('Wrong Password');</script>";

    }
    }
    //if username or email not found in database
    else{
    echo "<script>alert('User not registered with us');</script>";
    }

}
?>


<!doctype html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <style>
        .m-r-1em{margin-right:1em;}
        .m-b-1em{margin-bottom:1em;}
        .m-l-1em{margin-left:1em;}
    </style>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Login Form</h4>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-xs-6">
                      <div class="well">
                          <form id="loginForm" method="post">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username / Email id</label>
                                  <input type="text" class="form-control" id="email" name="email"  required="" title="Please enter you username or Email-id" placeholder="email " >
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                           
                              <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                          </form>
                      </div>
                  </div>
                  <div class="col-xs-6">
                      <p class="lead">Register now </p>
                  
                      <p><a href="createaccount.php" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
              </div>
          </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>