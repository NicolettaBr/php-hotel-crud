<?php
 
    require_once __DIR__ . '/database.php';
   
    
    $sql = "SELECT room_number, floor, id FROM stanze";
    $result = $conn->query($sql);

    $rooms=[];

    if ($result && $result->num_rows > 0) {

        // output data of each row
        while($row = $result->fetch_assoc()) {
        //echo "Stanza N. ". $row['room_number']. " piano: ".$row['floor'];
        $rooms[] = $row;
        }
    } 

    $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
</head>
<body>

    <h1>Lista delle Stanze</h1>

    <ul>
        <?php foreach($rooms as $room){ ?>
            
            <li>
                Numero stanza: <?php echo $room['room_number']; ?> <br>
                Piano stanza: <?php echo $room['floor']; ?> <br>
                <a href="room_info.php?id=<?php echo $room['id'];?>">Vedi dettagli stanza</a>
                
            </li>

        <?php } ?> 
    </ul>
    
</body>
</html>