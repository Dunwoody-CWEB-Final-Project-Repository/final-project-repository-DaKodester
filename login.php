<?php
include 'config/database.php';

echo htmlspecialchars($_POST['email']);
echo htmlspecialchars($_POST['password']);

?>
<html>

  <head>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Sign in</title>
  </head>
  
  <body>
    <div class="main">
      <p class="sign" align="center">Sign in</p>
        <form class="form1" form method="POST" action="login.php">
          

          <input name="email" class="un " type="text" align="center" placeholder="Email">
          <input name="password" class="pass" type="password" align="center" placeholder="Password">
          <input type="submit" class="special" value="Make Account" />
                
                  
        </form>
    </div>
       
  </body>
  
  </html>

 

