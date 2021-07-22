<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$sql = "SELECT * FROM activities";
						
				$response['errorfound'] = "1";
				$response['message'] = 'No Activity Found added';

				$response['activities'] = array();
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
							$activity['ActivityId'] = $row['ActivityId'];
							$activity['Name'] = $row['Name'];
							$activity['Description'] = $row['Description'];
							$activity['Duration'] = $row['Duration'];
							$activity['BurnedCalories'] = $row['BurnedCalories'];
							$activity['Image'] = $row['Image'];
							$activity['CreatedDate'] = $row['CreatedDate'];

							array_push($response['activities'], $activity);
						}
						mysqli_close($conn);

                        if($record_found)
                        {
							$response['errorfound'] = "0";
							$response['message'] = 'Activities found';

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
