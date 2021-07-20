<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$sql = "SELECT * FROM diets";
						
				$response['errorfound'] = "1";
				$response['message'] = 'No Diet Found';

				$response['diets'] = array();
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = '';

						while($row = mysqli_fetch_assoc($result))
						{                          
							$diet['DietId'] = $row['DietId'];
							$diet['Name'] = $row['Name'];
							$diet['Type'] = $row['Type'];
							$diet['Description'] = $row['Description'];
							$diet['Image'] = $row['Image'];
							$diet['Calories'] = $row['Calories'];
							$diet['Day'] = $row['Day'];

							$diet['errorfound'] = "0";
							$diet['message'] = 'Login Successfull';

							array_push($response['diets'], $diet);
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
				$response['message'] = "Error occured during fetching diets";
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
