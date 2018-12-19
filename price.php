<?php
	  
      $url = "https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5";

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);  
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 3);     
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
      $html = curl_exec($ch);
      curl_close($ch);
      
      
      $exch = json_decode($html, true);
      
      $USD =  $exch[0]["sale"];
      
      settype($USD, "float");
      
      round($USD, 2);	  
          
      
          $db = mysqli_connect("localhost","mybd_user","123","product");
          $sql = "SELECT price FROM plist";
          $result = mysqli_query($db, $sql);
      
      
      if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {
              $UAH =  $row["price"] ; 
          }
      } else {
          echo "0 results";
      }
      
      settype($UAH, "integer");
      
      echo $UAH*$USD

?>




