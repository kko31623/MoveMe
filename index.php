
                                                                                  
                                                                                                                     
<?php 
      ///*
        $location = $_POST["location"];
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "http://api.zoopla.co.uk/api/v1/property_listings.json?area=" . $location . "&api_key=c88442waawanw44ygzem2ee2"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        $json = curl_exec($ch); 
        curl_close($ch);      
        $data = json_decode($json);
        //var_dump($data);
     	
      $listData = array();
  		foreach ($data->listing as $item) {
    	$listData[] = array(
        	'area_name' => $data->area_name,
          'num_bedrooms' => $item->num_bedrooms,
          'property_type' => $item ->property_type,
          'num_floors' => $item ->num_floors,
          'price' => $item ->price,
          'address' => $item ->displayable_address,
          'description' => $item->description
    );
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Listings</title>
</head>
<body>
  <ol>
    <?php foreach($listData as $result): ?>
    <li>
          <p>Area: <?= $result["area_name"]?></p>
          <p>No. of bedrooms: <?= $result["num_bedrooms"]?></p>
          <p>Property Type: <?= $result["property_type"]?></p>
          <p class="listing">Price:£<?= $result["price"] ?></p>
          <p>Address: <?=$result["address"] ?></p>
        <!--   <p>Description: <?=$result["description"] ?></p> -->

          
        </li>
    <?php endforeach ?>
  </ol>
</body>
</html>

 