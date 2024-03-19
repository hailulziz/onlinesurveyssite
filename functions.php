<?php

function check_login($con)
{
	if(isset($_SESSION['id']))
	{

		$id = $_SESSION['id'];
		// $query = "select * from users where user_id = '$id' limit 1";

		// $result = mysqli_query($con,$query);
		// if($result && mysqli_num_rows($result) > 0)
		// {

		// 	$user_data = mysqli_fetch_assoc($result);
		// 	return $user_data;
		// }
		return $id;
	}
	return "not set";
}

function random_num($length)
{

	// Define the minimum and maximum values for the specified length
    $min = intval(pow(10, $length - 1));
    $max = intval(pow(10, $length) - 1);

	// Ensure that the minimum value is at least 0
    $min = max($min, 0);

    // Generate a random number within the specified range
    $randomNumber = rand($min, $max);

    // Return the generated random number
    return $randomNumber;
}