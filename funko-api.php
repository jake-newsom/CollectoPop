<?php

class funkoApi{

	function getServer(){
		return "http://104.255.231.15:3030";
	}

	function http_auth_get($url,$method,$data = null){
		$curl = curl_init();

		$options = array(
			CURLOPT_PORT => "3030",
			CURLOPT_URL => $this->getServer().$url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_HTTPHEADER => array(
				"cache-control: no-cache",
				"content-type: application/x-www-form-urlencoded",
			)
		);
		curl_setopt_array($curl,$options);

		if($data!=null){
			$data = http_build_query($data);
			curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
		}

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return $err;
		} else {
		  return $response;
		}
	}

	function addPop($data){
		$result = $this->http_auth_get("/v1/pop","POST",$data);
		return $result;
	}

	function getPops(){
		$result = $this->http_auth_get("/v1/pops","GET");
		return json_decode($result);
	}

}


?>