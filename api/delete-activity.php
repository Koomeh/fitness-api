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
			$file = fopen("output.txt","w");
			fwrite($file, '$REQUEST_METHOD : '.$_SERVER['REQUEST_METHOD'].'\n');
			fclose($file);			
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
                $PersonalActivityId = $input['PersonalActivityId'];

				$sql = "DELETE FROM personalactivities WHERE PersonalActivityId='$PersonalActivityId'";
				$file = fopen("delete-activity.txt","w");
                fwrite($file, '$PersonalActivityId : '.$PersonalActivityId.'\n');
                fwrite($file, '$sql : '.$sql.'\n');
                fclose($file);
				$response['errorfound'] = "1";
				$response['message'] = 'No Personal Activity found';
				
				try
				{
					if($result = mysqli_query($conn, $sql))
					{
						$response['errorfound'] = "0";
						$response['message'] = 'Activity Deleted Successfully';

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