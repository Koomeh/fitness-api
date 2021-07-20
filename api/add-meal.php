<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{           
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$Type = $_POST['Type'];
				$Calories = $_POST['Calories'];
				$Day = $_POST['Day'];
				$UserId = $_POST['UserId'];
				$UserEmail = $_POST['UserEmail'];

				$sql = "INSERT INTO meals(Type, Calories, Day, UserId, UserEmail) "
					. " VALUES ('$Type','$Calories','$Day','$UserId', '$UserEmail')";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not added';
				try
				{
					if(mysqli_query($conn, $sql))
					{
						$response['errorfound'] = '0';
						$response['message'] = 'success';
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
				$response['message'] = "Error occured adding meal";
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
