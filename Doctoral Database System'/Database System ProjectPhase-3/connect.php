<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="doctoral";

$connect = new mysqli($servername,$username,$password,$dbname);
 
if($connect->connect_error){
    die("Connection failed".$connect->connect_error);
}

$sql1="select * from instructor;";
$result1=$connect->query($sql1);
echo "<html><h1>Instructor</h1></html>";
echo "<table border='1'><tr><th>InstructorId</th><th>FName</th><th>LName</th><th>StartDate</th><th>Degree</th><th>Rank</th><th>Type</th></tr>";
while($row=$result1->fetch_assoc()){
    echo "<tr><td>".$row["InstructorId"]."</td>
    <td>".$row["FName"]."</td>
    <td>".$row["LName"]."</td>
    <td>".$row["StartDate"]."</td>
    <td>".$row["Degree"]."</td>
    <td>".$row["Rank"]."</td>
    <td>".$row["Type"]."</td></tr>";  
}
echo "</table>";

$sql2="select * from coursestaught;";
$result2=$connect->query($sql2);
echo "<html><h1>Course Taught</h1></html>";
echo "<table border='1'><tr><th>CourseID</th><th>InstructorId</th></tr>";
while($row=$result2->fetch_assoc()){
    echo "<tr><td>".$row["CourseID"]."</td>
    <td>".$row["InstructorId"]."</td></tr>";  
}
echo "</table>";

$sql3="select * from phdcommittee;";
$result3=$connect->query($sql3);
echo "<html><h1>PHD Committee</h1></html>";
echo "<table border='1'><tr><th>StudentId</th><th>InstructorId</th></tr>";
while($row=$result3->fetch_assoc()){
    echo "<tr><td>".$row["StudentId"]."</td>
    <td>".$row["InstructorId"]."</td></tr>";  
}
echo "</table>";
?>
<a href="form.html" style="text-decoration: none;">Go to Form Page</a>