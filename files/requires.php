<?php
$dbServerName = "localhost";

$dbUserName = "root";

$dbPassword = "";

$dbName = "movielibrary";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
function rateLoop()
{
    for ($i = 1; $i <= 10; $i++) {
        echo "<option value=$i>$i</option>";
    }

}
function yearLoop()
{
    for ($i = 1918; $i <= 2018; $i++) {
        echo "<option value=$i>$i</option>";
    }

}
function backWardYears ()
{
    for ($i = 2018; $i >= 1921; $i--) {
        echo "<option value=$i>$i</option>";
    }

}


function averageRate($name,$conn)
{
    $sql="SELECT AVG(rate) AS Average  FROM rate WHERE nameofthemovie='$name'";
    $query=mysqli_query($conn, $sql);     
    $result = mysqli_fetch_assoc($query);
    return $result['Average'];
    
}
function arrangeTheList($conn)
{
$sql="SET @count = 0";
mysqli_query($conn, $sql);
$sql="UPDATE `rate` SET `rate`.`id` = @count:= @count + 1";
mysqli_query($conn, $sql);
$sql="ALTER TABLE `rate` AUTO_INCREMENT = 1";
mysqli_query($conn, $sql);
}

?>
<script>
function submitHomePage()
{
    var frm=document.getElementById("theform");
    frm.action="http://localhost/";
    frm.submit();
}
</script>

