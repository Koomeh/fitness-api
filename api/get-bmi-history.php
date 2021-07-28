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
                $UserEmail = $input['UserEmail'];
                //$UserEmail = $_POST['UserEmail'];

				$sql = "SELECT * FROM history WHERE Email='$UserEmail'";
				$file = fopen("output.txt","w");
                fwrite($file, '$UserEmail : '.$UserEmail);
                fwrite($file, '$sql : '.$sql);
                fclose($file);
				$response['errorfound'] = "1";
				$response['message'] = 'No History Found';

				$response['histories'] = array();
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
							$history['HistoryId'] = $row['HistoryId'];
							$history['UserEmail'] = $row['Email'];
							$history['Age'] = $row['Age'];
							$history['Weight'] = $row['Weight'];
							$history['Height'] = $row['Height'];
							$history['BMI'] = $row['BMI'];
							$history['CreatedDate'] = $row['CreatedDate'];

							array_push($response['histories'], $history);
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
