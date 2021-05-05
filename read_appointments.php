<?PHP
	session_start();
	include 'config/database.php';

	if (strlen($_SESSION['userlogin']) == 0){
		header('location:logintest.php');
	}
	else{
		$email=$_SESSION['userlogin'];
        $getID="SELECT userID
                FROM users
                WHERE email = :email;";
        $getIDSTMT=$con->prepare($getID);
        $getIDSTMT->bindParam(":email", $email);
        $getIDSTMT->execute();

        $row = $getIDSTMT->fetch(PDO::FETCH_ASSOC);
        $userID = htmlspecialchars($row['userID'], ENT_QUOTES);
?>

<!DOCTYPE HTML>
<HTML>
<head>
    <link rel="stylesheet" href="assets/css/read.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <?php
    // include configuration file
    include 'config/database.php';

    // include database connection
    include 'config/database.php';

    // get passed parameter value, in this case, the record ID
    // isset() is a PHP function used to verify if a value is there or not
    //$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    // page header
    $page_title="Read Appointments";

    // prepare 'select' query
    $query = "SELECT fname, lname, email, description
                FROM appointments
                WHERE userID=:userID
                ORDER BY fname";

    $stmt = $con->prepare( $query );
    $stmt->bindParam(":userID", $userID);
    $stmt->execute();


    echo "<table class='table table-striped.table table-hover'>";

        echo "<tr>";
            echo "<th>First Name</th>";
            echo "<th>Last Name</th>";
            echo "<th>Email</th>";
            echo "<th>Description</th>";
        echo "</tr>";
        // store retrieved row to a variable
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            echo "<tr>";    
            echo     "<td>{$fname}</td>";   
            echo      "<td>{$lname}</td>";
            echo      "<td>{$email}</td>";
            echo      "<td>{$description}</td>";
            echo "</tr>";
        
        }
    echo "</table>";
    ?>
    <footer>
    </footer>
</body>

</html>
<?php
	}
?>
