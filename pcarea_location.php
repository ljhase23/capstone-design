<?php

    $host = "localhost";
    $user = "pcarea";
    $pw = "carnival23!";
    $dbName = "pcarea";

    $conn = new mysqli($host, $user, $pw, $dbName);

    class Location{
        public $name;
        public $x;
        public $y;
    }
    /* SELECT 예제 * 연결 */
    $sql = "SELECT * FROM pcarea_information";
    $result = mysqli_query($conn, $sql);
    $arr = array();
    $cnt = 0;
    if($result){
        while($row = mysqli_fetch_array($result)){
           
            $pczone = new Location();
            $pczone -> name = $row['name'];
            $pczone -> x = $row['x'];    
            $pczone -> y = $row['y'];            
            $arr[] = $pczone;
        }
    } else {
        $arr = array(0 => 'empty');
    }
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
    
    mysqli_close($conn);
?>