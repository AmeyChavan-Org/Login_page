<?php
	$email=$_POST['email'];
	$password=$_POST['password'];
	$con = new mysqli("localhost","root","","text");
	if($con->connect_error){
	die("sorry fail to connect:".$con->connect_error);
	}else{
		$stmt= $con->prepare("select * from registration where email = ? ");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$stmt_result =$stmt->get_result();
		if($stmt_result->num_rows> 0) {
				$data =$stmt_result->fetch_assoc();
				if($data['password'] === $password)
					{echo "<h2>login successfully</h2>";
							}
						else{
						echo "<h2>login invalid</h2>";
							}
			} 
			else{
			echo "<h2>Sorry Invalid input is given<h2>";
		}
}
		
?>