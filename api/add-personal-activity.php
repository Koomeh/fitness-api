<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{           
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$UserEmail = $_POST['UserEmail'];
				$Name = $_POST['Name'];
				$Met = $_POST['Met'];
				$Weight = $_POST['Weight'];
				$Duration = $_POST['Duration'];

                $calories = 0;
                if($Duration > 30 && $Duration <= 60)
                {
                    $calories = 400;
                }
                if($Duration > 60 && $Duration <= 120)
                {
                    $calories = 600;
                }
                if($Duration > 120)
                {
                    $calories = 1000;
                }

                $file = fopen("calories.txt","w");
                fwrite($file, 'Duration : '.$Duration.'\n');
                fwrite($file, 'calories : '.$calories.'\n');
                fclose($file);                

				$BurnedCalories = strval($calories);
                $lst = explode("/", $_POST['Image']);
	            $length = count($lst);
                $Image = $lst[$length - 1];
				$CreatedDate = $_POST['Day'];

                $sql = "INSERT INTO personalactivities(UserEmail, Name, Description, Met, Weight, "
                     . " Duration, BurnedCalories, Image, CreatedDate) "
                     . " VALUES ('$UserEmail','$Name', (SELECT Description FROM activities WHERE activities.Name='$Name'),'$Met','$Weight','$Duration','$BurnedCalories','$Image',"
                     . " '$CreatedDate')";
						
                // $file = fopen("output.txt","w");
                // fwrite($file, $sql);
                // fclose($file);
				$response['errorfound'] = "1";
				$response['message'] = 'Not added';
				try
				{
					if(mysqli_query($conn, $sql))
					{
						$response['errorfound'] = '0';
						$response['message'] = 'success';
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
				$response['message'] = "Error occured adding meal";
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
