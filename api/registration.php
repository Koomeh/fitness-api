<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$Name = $_POST['Name'];
				$MobileNo = $_POST['MobileNo'];
				$Email = $_POST['Email'];
				$Password = md5($_POST['Password']);
				$UserType = 'USER';
				$CreatedDate = $date_object = date('Y-m-d H:i:s');

				$sql = "INSERT INTO users( MembershipId, Name, UserType, Email, Password, MobileNo, CreatedDate) "
					. " VALUES ('','$Name','$UserType','$Email','$Password','$MobileNo', '$CreatedDate')";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not added';
				try
				{
					if(mysqli_query($conn, $sql))
					{
						$response['errorfound'] = '0';
						$response['message'] = 'Registration was Successfull';
					}
				
					mysqli_close($conn);
				}
				catch(Exception $e)
				{
					$response['errorfound'] = '1';
					$response['message'] = $e->getMessage();
				}
			}
			else
			{
				$response['message'] = "Error occured during Registration";
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
