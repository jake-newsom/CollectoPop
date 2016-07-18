<?php
set_time_limit(0);
ignore_user_abort(1);

require_once("simple_html_dom.php");
require_once("funko-api.php");
ini_set("memory_limit","512M");
//building this script to scrape funko's website for the vinyl pops to populate my database

$endpoint = "http://funko.com/collections/pop-vinyl?page=";
$page = 1;

$out_of_data = false;

$api = new funkoApi();


while(!$out_of_data){
	$full_content = file_get_html($endpoint.$page);
	//echo $full_content;

	$products = $full_content->find('.product-item');
	//loop through products on this page
	foreach($products as $pop){
		$img = "https:".$pop->find('img',0)->src;
		$name = str_replace("Funko Pop! ","",$pop->find('img',0)->alt);
		$name = str_replace("Funko POP! ","",$name);
		$name = str_replace("Pop!","",$name);
		$name = str_replace("POP!","",$name);
		$sku = str_replace("<span class=\"skutitle\">item #</span>","",$pop->find('.product-sku',0)->innertext);



		$popData = array(
			"name"=>$name,
			"item_number"=>$sku,
			"box_number"=>0,
			"available"=>"2016-07-17 00:00:00"
			);
		$result = $api->addPop($popData);
		$popInfo = json_decode($result,true);
		echo "Added pop #".$popInfo['id']."\r\n";

		copy($img, '/var/www/html/collectopop/images/pops/'.$popInfo['id'].".jpg");



	}
	if(count($products) <= 0 || $products == null){
		$out_of_data = true;
	}
	$page++;
}

?>

