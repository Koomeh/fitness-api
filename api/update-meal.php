<?php
    include 'db_config.php';

	try
	{
		$conn = new mysqli($HostName, $UserName, $UserPassword, $DatabaseName);

		while(true)
		{           
			if($_SERVER['REQUEST_METHOD'] == 'POST')
			{
				$IngredientName = $_POST['Name'];
				$Calories = $_POST['Calories'];
				$Quantity = $_POST['Quantity'];
				$IngredientId = $_POST['IngredientId'];
				$UserEmail = $_POST['UserEmail'];
				$MealType = $_POST['MealType'];

				$sql = "UPDATE meals SET IngredientName='$IngredientName',  Calories='$Calories', Quantity='$Quantity', "
                     . " IngredientId='$IngredientId' WHERE UserEmail='$UserEmail' AND Type='$MealType' ";
						
				$response['errorfound'] = "1";
				$response['message'] = 'Not updated';
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
