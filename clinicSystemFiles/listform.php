<!DOCTYPE html>

<!-- 
    Programmer Name: 98 
    This form allows users to select options for listing patients.
    Users can choose to sort patients by first or last name and specify the sort order as ascending or descending.
-->
  
<html>
<head>
  <title>Patient List Options</title>
  <link rel="stylesheet" type="text/css" href="listform.css">
</head>
<body>
  <h1>CS3319 Clinic Patient List</h1>
  <form action="listpat.php" method="POST">
    <label for="sortBy">List By:</label><br>
    <input type="radio" name="sortBy" value="firstname" required> First Name<br>
    <input type="radio" name="sortBy" value="lastname"> Last Name<br><br>

    <label for="sortOrder">List In:</label><br>
    <input type="radio" name="sortOrder" value="ASC" required> Ascending Order<br>
    <input type="radio" name="sortOrder" value="DESC"> Descending Order<br><br>

    <button type="submit">List</button>
  </form>
</body>
</html>

