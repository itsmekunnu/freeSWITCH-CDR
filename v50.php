<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "ashish123";
$dbname = "calls";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT *
FROM final_cdr
ORDER BY final_cdr.index DESC
LIMIT 50";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    // output data of each row
    //echo "<table border="1" style="width:100%">";
    //<table border="1" style="width:100%">
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" .$row['index'] . "</td><td>" ."</td><td>" .$row['caller_id_number'] . "</td><td>" . $row['destination_number'] ."</td><td>" . $row['answer_call_stamp'] ."</td><td>" . $row['end_call_stamp'] ."</td><td>" . $row['billsec_seconds'] . "</td></tr>";
        //echo "<tr><td>" .$row['caller_id_number'] . "</td><td>" . $row['destination_number'] ."</td><td>" . $row['answer_call_stamp'] ."</td><td>" . $row['end_call_stamp'] ."</td><td>" . $row['billsec_seconds'] . "</td></tr>";
    }
    echo "</table>";
    //</table>
} else {
    echo "0 results";
}

mysqli_close($conn);
?> 

</body>
</html>