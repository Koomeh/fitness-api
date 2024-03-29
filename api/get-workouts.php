<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$sql = "SELECT * FROM exercises";
						
				// $response['errorfound'] = "1";
				// $response['message'] = 'No Workout Found added';

				$response['workouts'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = '';

                        $record_found = 0;
						while($row = mysqli_fetch_assoc($result))
						{
                            $record_found = 1;
							$workout['ExerciseId'] = $row['ExerciseId'];
							$workout['ExerciseName'] = $row['ExerciseName'];
							$workout['Description'] = $row['Description'];
							$workout['Mistakes'] = $row['Mistakes'];
							$workout['Image'] = $row['Image'];
							$workout['CreatedDate'] = $row['CreatedDate'];

							array_push($response['workouts'], $workout);
						}
						mysqli_close($conn);

                        if($record_found)
                        {
							$response['errorfound'] = "0";
							$response['message'] = 'Workouts found';

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
