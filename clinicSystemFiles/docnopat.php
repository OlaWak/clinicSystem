<?php

/*
  Programmer Name: 98
  This script retrieves and displays a list of doctors who currently have no patients 
  assigned to them. It performs a left join between doctors and patients to identify 
  unassigned doctors and displays the results in a table format.
*/

include 'connectdb.php';

$query = "
    SELECT d.docid AS doctorid, d.firstname, d.lastname
    FROM doctor d
    LEFT JOIN patient p ON d.docid = p.treatsdocid
    WHERE p.treatsdocid IS NULL
    ORDER BY d.firstname ASC";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("Database query failed: " . mysqli_error($connection));
}

echo "<!DOCTYPE html>
<html>
<head>
  <title>Doctors with No Patients</title>
  <link rel='stylesheet' type='text/css' href='docform.css'>
</head>
<body>
  <h1>Doctors with No Patients</h1>
  <table>
    <tr>
      <th>Doctor ID</th>
      <th>First Name</th>
      <th>Last Name</th>
    </tr>";


while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['doctorid']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
          </tr>";
}

echo "  </table>
    </body>
    </html>";


mysqli_free_result($result);
mysqli_close($connection);
?>

