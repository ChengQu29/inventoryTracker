<?php
// Create connection
$conn = new mysqli('localhost', 'root', '', 'inventory');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$output = '';

if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "SELECT * FROM items WHERE Name LIKE '%". $search."%' ";
}else{
  $query = "SELECT * FROM items";
}
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
  $output .='
   <div class="table-responsive">
    <table calss="table table bordered">
    <tr>
    <th>Item number</th>
    <th>Name</th>
    <th>Type</th>
    <th>Make</th>
    <th>Model</th>
    <th>Brand</th>
    <th>Description</th>
    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
    $output .='
      <tr>
        <td>'.$row["ID"].'</td>
        <td>'.$row["Name"].'</td>
        <td>'.$row["Type"].'</td>
        <td>'.$row["Make"].'</td>
        <td>'.$row["Model"].'</td>
        <td>'.$row["Brand"].'</td>
        <td>'.$row["Description"].'</td>

      </tr>
    ';
  }
  echo $output;
}
else
{
  echo 'Data Not Found';
}
?>
