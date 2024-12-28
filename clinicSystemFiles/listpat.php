<?php

/*
  Programmer Name: 98
  This script retrieves and displays a list of patients, with the option to sort 
  by first or last name in ascending or descending order. It also shows each patient's assigned doctor and includes 
  conversions for weight (kg to lbs) and height (meters to feet/inches) as required by the prof.
*/

include 'connectdb.php';


// Set default values for sorting if no form data is available
$sortBy = isset($_POST['sortBy']) ? $_POST['sortBy'] : 'firstname';
$sortOrder = isset($_POST['sortOrder']) ? $_POST['sortOrder'] : 'ASC';


$query = "SELECT patient.*, doctor.firstname AS docfirstname, doctor.lastname AS doc_lastname
          FROM patient
          LEFT JOIN doctor ON patient.treatsdocid = doctor.docid
          ORDER BY $sortBy $sortOrder";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}


echo "<!DOCTYPE html>
<html>
<head>
  <title>Patient List</title>
  <link rel='stylesheet' type='text/css' href='listform.css'>
</head>
<h1> Patients List </h1>
<body>";


echo "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
          <th>OHIP</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Birthdate</th>
          <th>Weight (kg/lbs)</th>
          <th>Height (ft/in)</th>
          <th>Doctor's First Name</th>
          <th>Doctor's Last Name</th>
        </tr>"; 

// This while loop is to fetch and display each row of data
while ($row = mysqli_fetch_assoc($result)) {
    // Here we have the logic to convert weight from kg to lbs
    $weightKg = $row['weight'];
    $weightLbs = round($weightKg * 2.20462, 2);

    // Here we have to logic to convert height from meters to feet and inches
    $heightM = $row['height'];
    $heightFt = floor($heightM * 3.28084);
    $heightIn = round(($heightM * 3.28084 - $heightFt) * 12, 2);

    echo "<tr>
            <td>{$row['ohip']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['birthdate']}</td>
            <td>{$weightKg} kg / {$weightLbs} lbs</td>
            <td>{$heightFt} ft / {$heightIn} in</td>
            <td>{$row['docfirstname']}</td>
            <td>{$row['doc_lastname']}</td>
          </tr>"; 
}

echo "</table>";

echo "<br>
      <button onclick=\"window.location.href='mainmenu.php'\" style=\"display: block; margin: 10px 0; background-color: #004aad; color: white; font-family: 'Merriweather', sans-serif; font-weight: 400; padding: 10px; width: 250px; border: none; border-radius: 5px; cursor: pointer;\">Go Back to Main Menu</button>";

      
echo "</body>
</html>";

mysqli_free_result($result);
mysqli_close($connection);
?>
