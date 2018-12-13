<?php
	  
	$db = mysqli_connect("localhost","mybd_user","123","product");
    $sql = "SELECT price FROM plist";
    $result = mysqli_query($db, $sql);


if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["price"] ; 
    }
} else {
    echo "0 results";
}


?>




