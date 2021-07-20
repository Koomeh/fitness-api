<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$sql = "SELECT * FROM ingredients";

				$response['ingredients'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = 'success';

						while($row = mysqli_fetch_assoc($result))
						{
							$ingredient['IngredientId'] = $row['IngredientId'];
							$ingredient['Name'] = $row['Name'];
							$ingredient['Calories'] = $row['Calories'];

							array_push($response['ingredients'], $ingredient);
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
				$response['message'] = "Error occured fetch";
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
