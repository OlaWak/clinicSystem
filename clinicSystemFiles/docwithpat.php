<?php

/*
  Programmer Name: 98
  This script allows the user to select a doctor and view their respective patients.
  It ensures the dropdown only contains doctors who have patients.
*/

include 'connectdb.php';

// Fetch doctors who have patients
$query = "
    SELECT DISTINCT d.docid, d.firstname, d.lastname
    FROM doctor d
    INNER JOIN patient p ON d.docid = p.treatsdocid
    ORDER BY d.firstname ASC";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>Select a Doctor</title>
  <link rel='stylesheet' type='text/css' href='docform.css'>  
</head>
<body>
  <h1>Select a Doctor</h1>
  <form action='docform.php' method='POST'>  
    <label for='docid'>Choose a Doctor:</label>
    <select name='docid' id='docid' required>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='{$row['docid']}'>{$row['firstname']} {$row['lastname']} ({$row['docid']})</option>";
}

echo "  </select>
        <br><br>
        <button type='submit'>View Patients</button>
      </form>
    </body>
    </html>";

mysqli_free_result($result);
mysqli_close($connection);
?>