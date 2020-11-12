<?php
function ingredient_json($url, $data, $proses){
	
	//global $conn;
	$by=$_SESSION["SESS_UID"];
	
	$ip = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');
	$datecr = date("Y-m-d H:i:s");
	
	//SERVER
	//STAGING =: 1.9.133.72
	//PRODUCTION: 1.9.133.70
	//$conn->debug=true;
	/*$conn->execute("INSERT INTO test_send(ip, data, createdt, status, hasil, ch, oleh) 
	VALUES('{$ip}','{$val}', '{$datecr}', '{$tindakan}', '{$proses}', 'Mula Hantar', '{$by}')");*/
	
	//exit;

	$ch='';
	if($url=='company'){
		$ch = curl_init('http://sistem.halal.gov.my/admin_ingredient/get_company.php');
	} else if($url=='produk'){
		$ch = curl_init('http://sistem.halal.gov.my/admin_ingredient/get_product.php');
	}
	//print $url.":".$ch;
	//$conn->debug=true;
	

	if(!empty($ch)){
		$payload = json_encode(array("data" => $data));
		//$payload = http_build_query(array("data" => $data));
		//attach encoded JSON string to the POST fields
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//execute the POST request
		$result = curl_exec($ch);
		//close cURL resource
		curl_close($ch);
		
		/*$val='';$bil=0;
		foreach ($data as $key => $value) {
			if($bil==0){ $val .= $key .":". $value; }
			else { $val .= ";".$key .":". $value; }
			$bil++;
		}
		$conn->execute("INSERT INTO test_send(ip, data, createdt, status, hasil, ch, oleh) 
		VALUES('{$ip}','{$val}', '{$datecr}', '{$tindakan}', ".tosql(addslashes($result)).", ".tosql($ch).", '{$by}')");*/
		
		//$conn->debug=false; exit;
		//print "<br>".$result;
		return $result;
		
	} else {
		/*$conn->execute("INSERT INTO test_send(ip, data, createdt, status, hasil, ch, oleh) 
		VALUES('{$ip}','{$val}', '{$datecr}', '{$tindakan}', 'GAGAL', ".tosql($ch).", '{$by}')");
		return 'Tiada tindakan';*/
	} //exit;
}

?>