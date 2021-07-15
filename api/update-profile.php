<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$UserId = $_POST['UserId'];
				$Age = $_POST['Age'];
				$Height = $_POST['Height'];
				$Weight = $_POST['Weight'];
                $bmi = 10000 * ($Weight/($Height * $Height));

                $sql = "UPDATE users SET Age='$Age', Height='$Height', Weight='$Weight', BMI='$bmi' WHERE UserId='$UserId'";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not updated';
                
				try
				{
					if(mysqli_query($conn, $sql))
					{
						$response['errorfound'] = '0';
						$response['message'] = 'Profile Updated';
						$response['Age'] = $Age;
						$response['Height'] = $Height;
						$response['Weight'] = $Weight;
						$response['BMI'] = number_format((float)$bmi, 2, '.', '');;

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
				$response['message'] = "Error occured during Update";
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
