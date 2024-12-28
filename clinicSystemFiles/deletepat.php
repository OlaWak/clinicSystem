<!DOCTYPE html>
<html>
<head>
  <title>Delete Patient</title>
</head>
<body>

<?php

/*
  Programmer Name: 98
  This script allows for the deletion of a patient. 
  It verifies if a patient (identified by OHIP number) is selected, performs the deletion if valid, 
  and uses JavaScript to display a message and stay on the same page after successful or failed deletion.
*/

include 'connectdb.php';

if (isset($_POST['ohip'])) {

    $ohip = $_POST['ohip'];

    $deleteQuery = "DELETE FROM patient WHERE ohip = '$ohip'";

    if (mysqli_query($connection, $deleteQuery)) {
        echo "<script type='text/javascript'>
            alert('Patient has been deleted successfully!');
            window.location.href = 'deleteform.php'; 
            </script>";
    } else {
        echo "<script type='text/javascript'>
            alert('Error: Unable to delete patient. " . mysqli_error($connection) . "');
            window.location.href = 'deleteform.php'; 
            </script>";
    }
} else {
    echo "<script type='text/javascript'>
        alert('Error: No patient selected for deletion.');
        window.location.href = 'deleteform.php'; 
        </script>";
}

mysqli_close($connection);
?>

</body>
</html>
