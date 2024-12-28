<!-- 
Programmer Name: 98 
This code handles the Add a New Patient functionality. 
We use PHP to retrieve data submitted from the patient form, check if the provided OHIP number is unique, 
and insert a new patient record if it is. If the OHIP number already exists in the database, 
we notify the user and redirect them back to the form to correct any issues. 
Additionally, we make sure to free any resources and close the database connection before finishing.
-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>CS3319 Clinic - Add a New Patient</title>
</head>
<body>
<?php
include 'connectdb.php';

$ohip = $_POST['ohip'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$treatsdocid = $_POST['doctor'];


$checkQuery = "SELECT * FROM patient WHERE ohip = '$ohip'";
$checkResult = mysqli_query($connection, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Used Javascript here to stay on the same page for the error and success messages
    echo "<script type='text/javascript'>
            alert('Error: The OHIP Number already belongs to another patient.');
            window.location.href = 'insertform.php'; // Redirect back to the insert form page
          </script>";
} else {

    $insertQuery = "INSERT INTO patient (ohip, firstname, lastname, birthdate, height, weight, treatsdocid)
                    VALUES ('$ohip', '$firstname', '$lastname', '$birthdate', '$height', '$weight', '$treatsdocid')";

    if (mysqli_query($connection, $insertQuery)) {
        echo "<script type='text/javascript'>
                alert('Patient has been added successfully!');
                window.location.href = 'insertform.php'; // Redirect back to the insert form page
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Error: Unable to add patient. " . addslashes(mysqli_error($connection)) . "');
                window.location.href = 'insertform.php'; 
              </script>";
    }
}

mysqli_free_result($checkResult);
mysqli_close($connection);
?>
</body>
</html>

