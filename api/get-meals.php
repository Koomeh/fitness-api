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
						
				// $response['errorfound'] = "1";
				// $response['message'] = 'No Workout Found added';

				$response['meals'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = '';

						while($row = mysqli_fetch_assoc($result))
						{
							$workout['MealId'] = $row['MealId'];
							$workout['MealName'] = $row['MealName'];
							$workout['MealType'] = $row['MealType'];
							$workout['Ingredients'] = $row['Ingredients'];
							$workout['Image'] = $row['Image'];
							$workout['CreatedDate'] = $row['CreatedDate'];

							$workout['errorfound'] = "0";
							$workout['message'] = 'Login Successfull';

							array_push($response['meals'], $workout);
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
