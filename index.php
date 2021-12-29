<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Select discount code.</h2>
  <!-- <form> -->
    <ul class="list-group">
    <?php

    function getDiscounts($_price_rul_id){
      // echo "==============curl start==============<br>"; 
      $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://kingdev10260522.myshopify.com/admin/api/2021-10/price_rules/'.$_price_rul_id.'/discount_codes.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      // CURLOPT_POSTFIELDS =>'{"script_tag":{"event":"onload","src":"https:\/\/localhost\/autoload.js"}}',
      CURLOPT_HTTPHEADER => array(
        'X-Shopify-Access-Token: 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',
        'Content-Type: application/json'
      ),
      ));

      $response = curl_exec($curl);
        $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

      curl_close($curl);
      $res = json_decode($response);
      return $res->discount_codes;
      // echo "==============curl end==============<br>";
    }



      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://kingdev10260522.myshopify.com/admin/api/2021-10/price_rules.json',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'X-Shopify-Access-Token: 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',
            'Content-Type: application/json'
        ),
      ));

    $response = curl_exec($curl);
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      curl_close($curl);
      $res = json_decode($response);
      $_price_rul_id = $res->price_rules[0]->id;
      foreach($res->price_rules as $price_rule){
        $discounts = getDiscounts($price_rule->id);
        foreach($discounts as $discount){
          echo '<li class="list-group-item" onclick="javascript:setDiscount(\''.$discount->code.'\')">';
            echo '<div class="radio">
              <label><input type="radio" name="optradio"><span style="color: blue;">' . $price_rule->value .'%' .$discount->code. '</span></label>
            </div>';
          echo '</li>';
        }
      }
      // echo "==============curl end==============<br>";
      // echo json_encode($data);
      
    ?>
    </ul>
  <!-- </form> -->
</div>

<script>

  function setDiscount(discount){
    $.post('https://localhost/myshopifyfirstapp/save_discount_code.php', { discount: discount, shop_name: 'kingdev10260522.myshopify.com' }, function(res){
      if(res === 'success'){
        alert("change discount successfully.")
      }
      else
        alert("change discount faild.")
    })
  }

$(document).ready(function(){
    
});
</script>

</body>
</html>
