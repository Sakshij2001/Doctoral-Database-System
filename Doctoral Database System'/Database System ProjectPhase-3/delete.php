<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="doctoral";

$connect = new mysqli($servername,$username,$password,$dbname);
 
if($connect->connect_error){
    die("Connection failed".$connect->connect_error);
}
$result1=$connect->query("delete from phdstudent where StudentId in(select gra.StudentId from gra where gra.StudentId not in (select DISTINCT(milestonespassed.StudentId) from milestonespassed));");

if($result1!=TRUE){
    echo "Successful Query-1";
    echo "</br>"; 
}else{
    echo "Error";
    echo "</br>"; 

}

$result2=$connect->query("delete from gra where StudentId in(select gra.StudentId from gra where gra.StudentId not in (select DISTINCT(milestonespassed.StudentId) from milestonespassed));");

if($result2){
    echo "Successful Query-2";
    echo "</br>"; 
}else{
    echo "Error";
    echo "</br>"; 

}

$connect->close();
?>
<a href="form.html" style="text-decoration: none;">Go to Form Page</a>