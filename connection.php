<?php


date_default_timezone_set('Asia/Kolkata'); 
$curr_date= date("Y-m-d H:i:s"); // time in India

$first_name =$_POST['fname'];
$last_name  =$_POST['lname'];
$email=$_POST['email'];
$linkedin=$_POST['linkedin'];
$drupal=$_POST['drupal'];
$position=$_POST['position'];
$start_date=$_POST['startdate'];
$mobile=$_POST['mobile'];
$current_city=$_POST['city'];
$city_name=$_POST['cityname'];
$relocate=$_POST['relocate'];
$last_company=$_POST['lastcompany'];
$comments=$_POST['comments'];


// Database connection
	$conn = new mysqli('localhost','root','','application');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into submissions(First_Name, Last_Name,date_time,email,linkedin_link , drupal_link , position,start_date,mobile_number,current_city ,city_name,relocate,last_comp_name,comments)
		values(?, ?, ? ,? ,?,? ,? ,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssssssss", $first_name, $last_name,$curr_date,$email,$linkedin,
		$drupal,$position,$start_date,$mobile,$current_city,$city_name,$relocate,$last_company,
		$comments
		);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>