<?php
 $servername="localhost";
 $username="root";
 $password="";
 $dbname="doctoral";

$connect = new mysqli($servername,$username,$password,$dbname);
 
if($connect->connect_error){
    die("Connection failed".$connect->connect_error);
}


$InstructorId = $_POST['InstructorId'];
$FName = $_POST['FName'];
$LName = $_POST['LName'];
$Degree = $_POST['Degree'];
$StartDate = $_POST['StartDate'];
$Type = $_POST['Type'];
$courseID = $_POST['courseID'];
$StudentId = $_POST['StudentId'];
$Rank = $_POST['Rank'];

//$sql1="INSERT INTO INSTRUCTOR(InstructorId, FName, LName, StartDate, Degree, Rank, Type) VALUES (?,?,?,?,?,?,?);";

$result1=$connect->prepare("INSERT INTO INSTRUCTOR(InstructorId, FName, LName, StartDate, Degree, Rank, Type) VALUES (?,?,?,?,?,?,?);");
$result1->bind_param("sssssss",$InstructorId, $FName, $LName, $StartDate, $Degree, $Rank, $Type);

if($result1->execute()){
    echo "Successful Query-1";
    echo "</br>"; 
}else{
    echo "Error";
}

$result2=$connect->prepare("INSERT INTO coursestaught(coursestaught.CourseID,coursestaught.InstructorId)VALUES(?, ?);");
$result2->bind_param("ss",$courseID,$InstructorId);

if($result2->execute()){
    echo "Successful Query-2";
    echo "</br>"; 
}else{
    echo "Error";
}

$result3=$connect->prepare("INSERT INTO phdcommittee(phdcommittee.StudentId,phdcommittee.InstructorId)VALUES(?, ?);");
$result3->bind_param("ss",$StudentId,$InstructorId);

if($result3->execute()){
    echo "Successful Query-3";
    echo "</br>"; 
}else{
    echo "Error";
}

$connect->close();
?>
<a href="form.html" style="text-decoration: none;">Go to Form Page</a>