<?php
    include 'db_config.php';

	$inputJSON = file_get_contents('php://input');
	if(get_magic_quotes_gpc())
    {
		$param = stripslashes($inputJSON);
	}
	else
    {
		$param = $inputJSON;
	}

	$input = json_decode($param, TRUE);

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$userEmail = $input['UserEmail'];
				$sql = "SELECT * FROM meals where UserEmail = '$userEmail'";

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
