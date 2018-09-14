<?php

require('dbConfig.php');

$uname=$_REQUEST['username'];
$pwd=$_REQUEST['password'];
try {
	
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	 $stmt = $conn->prepare("SELECT * FROM users WHERE username=:uname AND password=:pwd LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':pwd'=>$pwd));
		  $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
		
          if($stmt->rowCount() > 0){
				$role=$userRow['role'];
				session_start();
					$_SESSION['user_name'] = $userRow['name'];
					$_SESSION['role']=$userRow['role'];
					
					$_SESSION['email']=$userRow['email'];
					$_SESSION['ph_no']=$userRow['ph_no'];
				switch($role){
					case 'admin' : echo "jd";
					
					break;
					case 'ordercollection' : echo "ordercollection";
					break;
					default : echo "lab";
					break;
				}
	}else{
		echo "Please Enter the right User ID and Password";
	}
	
}    
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
?>