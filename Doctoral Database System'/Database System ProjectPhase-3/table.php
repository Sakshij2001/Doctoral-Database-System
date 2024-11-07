<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="doctoral";

$connect = new mysqli($servername,$username,$password,$dbname);
 
if($connect->connect_error){
    die("Connection failed".$connect->connect_error);
}


$sql1="select StudentId from phdstudent where StudentId in(select gra.StudentId from gra where gra.StudentId not in (select DISTINCT(milestonespassed.StudentId) from milestonespassed));";
$result1=$connect->query($sql1);
echo "<html><h1>PHD Student</h1></html>";
echo "<table border='1'><tr><th>StudentId</th></tr>";
while($row=$result1->fetch_assoc()){
    echo "<tr><td>".$row["StudentId"]."</td></tr>";  
}
echo "</table>";


$sql2="select StudentId from gra where StudentId in(select gra.StudentId from gra where gra.StudentId not in (select DISTINCT(milestonespassed.StudentId) from milestonespassed));";
$result2=$connect->query($sql2);
echo "<html><h1>GRA</h1></html>";
echo "<table border='1'><tr><th>StudentId</th></tr>";
while($row=$result2->fetch_assoc()){
    echo "<tr><td>".$row["StudentId"]."</td></tr>";  
}
echo "</table>";

$connect->close();
?><br>
<a href="form.html" style="text-decoration: none;">Go to Form Page</a>