<?php

echo "==============curl start==============<br>"; 
	$curl = curl_init();

	curl_setopt_array($curl, array(
	CURLOPT_URL => 'https://kingdev10260522.myshopify.com/admin/api/2021-10/sprice_rules/507328175/batch/173232803/discount_codes.json',
	// CURLOPT_RETURNTRANSFER => true,
	// CURLOPT_ENCODING => '',
	// CURLOPT_MAXREDIRS => 10,
	// CURLOPT_TIMEOUT => 0,
	// CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => 'GET',
	//CURLOPT_POSTFIELDS =>'{"script_tag":{"event":"onload","src":"https:\/\/localhost\/myshopifyfirstapp\/autoload.js"}}',
	CURLOPT_HTTPHEADER => array(
		'X-Shopify-Access-Token: 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',
		//'Content-Type: application/json'
	),
	));
	$response = curl_exec($curl);
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
// {"script_tag":{"id":171658739851,"src":"https:\/\/localhost\/myshopifyfirstapp\/autoload.js","event":"onload","created_at":"2021-12-27T16:48:41+03:00","updated_at":"2021-12-27T16:48:41+03:00","display_scope":"all","cache":false}
	curl_close($curl);
	echo $response;
	echo "==============curl end==============<br>";