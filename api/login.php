<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$Email = $_POST['Email'];
				$Password = md5($_POST['Password']);

				$sql = "SELECT * FROM users WHERE Email='$Email' AND Password='$Password'";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not Logged in';
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						if($row = mysqli_fetch_assoc($result))
						{
							$response['UserId'] = $row['UserId'];
							$response['MembershipId'] = $row['MembershipId'];
							$response['Name'] = $row['Name'];
							$response['UserType'] = $row['UserType'];
							$response['Email'] = $row['Email'];
							$response['Password'] = $row['Password'];
							$response['MobileNo'] = $row['MobileNo'];
							$response['CreatedDate'] = $row['CreatedDate'];

							$response['Age'] = $row['Age'];
							$response['Weight'] = $row['Weight'];
							$response['Height'] = $row['Height'];
							$response['BMI'] = $row['BMI'];
							$response['errorfound'] = "0";
							$response['message'] = 'Login Successfull';
							mysqli_close($conn);
						}
					}
				}
				catch(Exception $e)
				{
					$response['errorfound'] = '1';
					$response['message'] = $e->getMessage();
				}
			}
			else
			{
				$response['message'] = "Error occured during Login";
				$response['errorfound'] = "1";
			}
			break;
		}
	}
	catch(Exception $e)
	{
		$response['errorfound'] = '1';
		$response['message'] = $e->getMessage();
	}
	header('Content-Type: application/json');
    echo json_encode($response);    
?>
