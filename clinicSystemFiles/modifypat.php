<?php

/*
  Programmer Name: 98
  This script processes a weight modification request for a selected patient. 
  It retrieves the new weight and converts it to kilograms if provided in pounds, then updates the patient's 
  weight in the database. Success or error messages are displayed using JavaScript, and the user is redirected 
  back to the modify form page.
*/

include 'connectdb.php';

// Get the form data
$ohip = $_POST['ohip'];
$weight = $_POST['weight'];
$unit = $_POST['unit'];

// Convert weight to kilograms if it's in pounds
if ($unit == 'lb') {
    $weight = $weight * 0.453592;
}


$query = "UPDATE patient SET weight = ? WHERE ohip = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, "ds", $weight, $ohip);

if (mysqli_stmt_execute($stmt)) {
    echo "<script type='text/javascript'>
            alert('Patient has been modified successfully!');
            window.location.href = 'modifyform.php'; // Replace with your actual delete page name
            </script>";

} else {
    echo "<script type='text/javascript'>
        alert('Error: Something went wrong please try again.');
        window.location.href = 'modifyform.php'; // Replace with your actual delete page name
        </script>";

}

mysqli_stmt_close($stmt);
mysqli_close($connection);
?>

