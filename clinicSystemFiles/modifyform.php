<?php

/*
  Programmer Name: 98
  This script displays a list of patients, allowing the user 
  to select a patient and modify their weight. The form provides an input for the new weight, 
  with the option to specify units in kilograms or pounds. Upon submission, the updated weight 
  is sent to the server for processing through the modifypat.php.
*/

include 'connectdb.php';

$query = "SELECT ohip, firstname, lastname, weight FROM patient ORDER BY firstname ASC";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>Modify Patient Weight</title>
  <link rel='stylesheet' type='text/css' href='modifyform.css'>
</head>
<body>
  <h1>Select a Patient to Modify Weight</h1>
  <form action='modifypat.php' method='POST'>
    <table border='1' cellpadding='5' cellspacing='0'>
      <tr>
        <th>Select</th>
        <th>OHIP</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Weight (kg)</th>
      </tr>";

// Fetch and display each row of data with a radio button
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td><input type='radio' name='ohip' value='{$row['ohip']}' required></td>
            <td>{$row['ohip']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['weight']}</td>
          </tr>";
}

echo "  </table>
        <br>
        <label for='weightInput'>Modify Weight:</label>
        <input type='number' step='0.01' id='weightInput' name='weight' required>
        <label>
          <input type='radio' name='unit' value='kg' checked> kg
        </label>
        <label>
          <input type='radio' name='unit' value='lb'> lb
        </label>
        <br><br>
        <button type='submit'>Modify Selected Patient</button>
      </form>
    </body>
    </html>";

mysqli_free_result($result);
mysqli_close($connection);
?>

