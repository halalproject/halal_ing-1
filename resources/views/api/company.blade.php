<?php
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);

/* mandatori */
$authkey=$decoded["authkey"];
$name=strtoupper($decoded["name"]);
$regno=strtoupper($decoded["regno"]);
$typebusiness=$decoded["typebusiness"];
$tel=$decoded["tel"];
$email=$decoded["email"];
$category=$decoded["category"];
/* mandatori */
$address1=strtoupper(addslashes($decoded["address1"]));
$address2=strtoupper(addslashes($decoded["address2"]));
$address3=strtoupper(addslashes($decoded["address3"]));
$country=strtoupper(addslashes($decoded["country"]));
$postcode=$decoded["postcode"];
$city=$decoded["city"];
$state=$decoded["state"];
$district=$decoded["district"];
$officername=$decoded["officername"];
$position=$decoded["position"];
$idno=$decoded["idno"];
$officermail=$decoded["officermail"];
$officerhp=$decoded["officerhp"];

if($authkey==$KEY){
	if($regno!="" && $name!="" && $typebusiness!="" && $tel!="" && $email!="" && $category!=""){

		

		$link=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		/* check existing */
		$sqlcekclient="select * from client where app='CLIENT' and ic='$regno'";
		$rescekclient=mysqli_query($link,$sqlcekclient);
		$numcekclient=mysqli_num_rows($rescekclient);
		/* check existing */
			if($numcekclient>0 ){
				/* existing & update */
				$updateclient="update client set name='$name',cate1='$typebusiness',tel='$tel',mel='$email',poslevel='$category',addr='$address1',addr1='$address2',addr2='$address3',country='$country',pcode='$postcode',city='$city',state='$state',rem6='$district',rem5='$idno',mel1='$officermail',tel1='$officerhp' where ic='$regno'";
				$resclient=mysqli_query($link,$updateclient);
				if($resclient){
					$rowcekclient=mysqli_fetch_assoc($rescekclient);
					
					$sendData["status"]="200";
					$sendData["company_id"] = $rowcekclient['uid'];
					$sendData["company_regno"]= $rowcekclient['ic'];
					$sendData["company_email"]= $rowcekclient['mel'];
					$sendData["company_tel"]= $rowcekclient['tel'];
					$sendData["ehalal_regdate"] = $rowcekclient['regdt'];

					$msg = "Tahniah, Kemaskini maklumat syarikat dalam $CLIENT_URL dibuat,<br><br>
					Nama Syarikat: $name<br> 
					Pautan Login: <a href='$CLIENT_URL'>$CLIENT_URL</a><br>
					Username: $regno<br>
					Password: Katalaluan yang telah digunakan sebelum ini, jika terlupa boleh gunakan fungsi lupa katalaluan<br>";

					blastmel('Kemaskini Maklumat eHalal',$msg,$email,$MEL_SSL,$MEL_HOST,$MEL_PORT,$MEL_USER,$MEL_PASS,$MEL_REPLY,$MEL_FROM);

				}
			}else{

				$sqlcreateclient="insert into client(app,sid,pass,name,ic,cate1,tel,mel,poslevel,addr,addr1,addr2,country,pcode,city,state,rem6,rem5,regdt) values			('CLIENT','$MAIN_SID',md5('12345'),'$name','$regno','$typebusiness','$tel','$email','$category','$address','$address1','$address2','$country','$postcode','$city','$state','$district','$idno',now())";
				$rescreateclient=mysqli_query($link,$sqlcreateclient);
				$createdid=mysqli_insert_id($link);

				$uid=sprintf("C%05d",$createdid);
				$sql2="update client set uid='$uid' where id='$createdid'";			
				mysqli_query($link,$sql2);

				
				$sqlgetinfo="select * from client where app='CLIENT' and uid='$uid'";
				$resgetinfo=mysqli_query($link,$sqlgetinfo);
				$rowgetinfo=mysqli_fetch_assoc($resgetinfo);

					$sendData["status"]="201";
					$sendData["company_id"] = $rowgetinfo['uid'];
					$sendData["company_regno"]= $rowgetinfo['ic'];
					$sendData["company_email"]= $rowgetinfo['mel'];
					$sendData["company_tel"]= $rowgetinfo['tel'];
					$sendData["ehalal_regdate"] = $rowgetinfo['regdt'];

				
			$msg = "Tahniah kerana berjaya mendaftar eHalal,<br><br>
			Nama Syarikat: $name<br> 
			Pautan Login: <a href='$CLIENT_URL'>$CLIENT_URL</a><br>
			Username: $regno<br>
			Password: 12345 (sementara, sila kemaskini)<br>";

			blastmel('Pendaftaran eHalal',$msg,$email,$MEL_SSL,$MEL_HOST,$MEL_PORT,$MEL_USER,$MEL_PASS,$MEL_REPLY,$MEL_FROM);

			}

	}else{
		/* mandatori parameter not meet */
		$sendData["status"]="400";
		$sendData["response"]="Mandatory Data Not Included";
	}
	mysqli_close($link);
}else{
		/* authentication failed */
	$sendData["status"]="401";
	$sendData["response"]="Authentication Key Not Match";
}

$phpversion=phpversion();
if($phpversion>=5.4){
echo json_encode($sendData, JSON_UNESCAPED_UNICODE);
}else{
echo json_encode($sendData, 128);
}

?>