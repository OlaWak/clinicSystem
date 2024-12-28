<?php

/*
  Programmer Name: 98
  This script displays detailed information about a selected nurse, including the nurse's 
  supervisor (if any), doctors they work for, and hours worked with each doctor. It calculates and
  displays the total hours worked by the nurse across all assigned doctors.
*/

include 'connectdb.php';

$nurseid = $_POST['nurseid'];


$nurseQuery = "
    SELECT n.firstname AS nurse_firstname, n.lastname AS nurse_lastname, 
           s.firstname AS supervisor_firstname, s.lastname AS supervisor_lastname
    FROM nurse n
    LEFT JOIN nurse s ON n.reporttonurseid = s.nurseid
    WHERE n.nurseid = '$nurseid'";

$nurseResult = mysqli_query($connection, $nurseQuery);
if (!$nurseResult) {
    die("Database query failed: " . mysqli_error($connection));
}

$nurse = mysqli_fetch_assoc($nurseResult);
$nurseName = "{$nurse['nurse_firstname']} {$nurse['nurse_lastname']}";
$supervisorName = $nurse['supervisor_firstname'] ? "{$nurse['supervisor_firstname']} {$nurse['supervisor_lastname']}" : "No supervisor";

// This query is to get doctors that the nurse works for and hours worked with each doctor
$doctorQuery = "
    SELECT d.firstname AS doctor_firstname, d.lastname AS doctor_lastname, w.hours
    FROM workingfor w
    JOIN doctor d ON w.docid = d.docid
    WHERE w.nurseid = '$nurseid'";

$doctorResult = mysqli_query($connection, $doctorQuery);
if (!$doctorResult) {
    die("Database query failed: " . mysqli_error($connection));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>Nurse Information</title>
  <link rel='stylesheet' type='text/css' href='nurseform.css'>
</head>
<body>
  <h1>Nurse ID: $nurseid - $nurseName Information</h1>
  
  <!-- Table for Nurse Details and Supervisor Information -->
  <table>
    <tr>
      <th>Nurse Name</th>
      <td>$nurseName</td>
    </tr>
    <tr>
      <th>Supervisor</th>
      <td>$supervisorName</td>
    </tr>
  </table>

  <!-- Table for Doctors and Hours Worked -->
  <h2>Doctors and Hours Worked</h2>
  <table>
    <tr>
      <th>Doctor First Name</th>
      <th>Doctor Last Name</th>
      <th>Hours Worked</th>
    </tr>";

// Here we display each doctor and hours worked while we calculate the total hours
$totalHours = 0;
while ($row = mysqli_fetch_assoc($doctorResult)) {
    echo "<tr>
            <td>{$row['doctor_firstname']}</td>
            <td>{$row['doctor_lastname']}</td>
            <td>{$row['hours']}</td>
          </tr>";
    $totalHours += $row['hours'];
}

echo "  </table>
        <h3>Total Hours Worked: $totalHours</h3>
    </body>
    </html>";

echo "<br>
          <button onclick=\"window.location.href='mainmenu.php'\" style=\"display: block; margin: 10px 0; background-color: #004aad; color: white; font-family: 'Merriweather', sans-serif; font-weight: 400; padding: 10px; width: 250px; border: none; border-radius: 5px; cursor: pointer;\">Back to Main Menu</button>
          </body>
          </html>";



mysqli_free_result($nurseResult);
mysqli_free_result($doctorResult);
mysqli_close($connection);
?>

