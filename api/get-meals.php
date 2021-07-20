<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$sql = "SELECT * FROM meals";

				$response['meals'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = '';

						while($row = mysqli_fetch_assoc($result))
						{
							$meal['MealId'] = $row['MealId'];
							$meal['Type'] = $row['Type'];
							$meal['Calories'] = $row['Calories'];
							$meal['Day'] = $row['Day'];
							$meal['UserId'] = $row['UserId'];
							$meal['UserEmail'] = $row['UserEmail'];

							array_push($response['meals'], $meal);
						}
						mysqli_close($conn);
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
