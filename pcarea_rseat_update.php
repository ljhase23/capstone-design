<?php
    $id = $_GET['name'];
    $seat = $_GET['seat'];

    $host = "localhost";
    $user = "pcarea";
    $pw = "carnival23!";
    $dbName = "pcarea";

    $conn = new mysqli($host, $user, $pw, $dbName);
    $sql = "UPDATE pcarea_rseat SET seat = seat WHERE name = id;"
    $result = mysqli_query($conn, $sql);

    /* SELECT 예제 * 연결 */
    $sql = "SELECT * FROM pcarea_rseat WHERE name = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
        while($row = mysqli_fetch_array($result)){
            $arr = array("name" => $row['name'],
            "seat" => $row['seat']);

            
            echo json_encode($arr, JSON_UNESCAPED_UNICODE);
        }
    }
    
    mysqli_close($conn);
?>