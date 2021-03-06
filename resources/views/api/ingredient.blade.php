<?php
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);

/* mandatori */
$authkey=$decoded["authkey"];
$company_id=$decoded["company_id"];
if($company_id!=""){
	$sqlcompanyid=" and uid='$company_id'";
}
$regno=$decoded["regno"];
$ingredient_name=$decoded["ingredient_name"];
$ingredient_othername=$decoded["ingredient_othername"];
$ing_category=$decoded["ing_category"];
$supplier=$decoded["supplier"];
$supplier_origin=$decoded["supplier_origin"];
$supplier_addr=$decoded["supplier_addr"];
$supplier_addr2=$decoded["supplier_addr2"];
$supplier_addr3=$decoded["supplier_addr3"];
$distributor_name=$decoded["distributor_name"];
$ing_scheme=$decoded["ing_scheme"];
$source_type=$decoded["source_type"];
$ing_type=$decoded["ing_type"];
$ing_expiration=$decoded["ing_expiration"];
$ing_icode=$decoded["icode"];

/** log :: Input **/
writelog($ts,'INGREDIENT',"ehalal","API INGREDIENT",'GET DATA='.$content.'','');
/** log :: Input **/

if($authkey==$KEY){
	if($regno!="" && $ingredient_name!="" && $ingredient_othername!="" && $ing_category!="" && $supplier!="" && $supplier_origin!="" && $supplier_addr!="" && $distributor_name!="" && $ing_scheme!="" && $source_type!="" && $ing_type!="" && $ing_expiration!="" && $ing_icode!=""){

		

		$link=mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
		if(mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		
		/* check existing */
		$sqlcekclient="select * from client where app='CLIENT' and ic='$regno' $sqlcompanyid";
		$rescekclient=mysqli_query($link,$sqlcekclient);
		$numcekclient=mysqli_num_rows($rescekclient);
		/* check existing */
			if($numcekclient>0 ){
				/* insert new allowed ingredient */
				$rowcekclient=mysqli_fetch_assoc($rescekclient);
				$adm=$rowcekclient['uid'];

				$today=date('ymd');


				$sqlcountdata="select max(id) as bil from ingredient where ing_id not like '%DRAF%'";
				$rescountdata=mysqli_query($link,$sqlcountdata);
				$rowcountdata=mysqli_fetch_assoc($rescountdata);
				$lastid=$rowcountdata['bil']+1;
				$lastid=sprintf("%06d",$lastid);
				//$lastid="ING-".$today."-".$lastid;
				$lastid=$adm."-".$today."-".$lastid;

				$inserting="insert into ingredient(ing_id,ing_name,ing_othername,ing_source,ing_origin,ing_category,ing_type,ing_scheme,ing_expiration,ing_attachment,ing_createdate,ing_requestby,ing_supplier,ing_supplieraddr,ing_supplieraddr2,ing_supplieraddr3,ing_supplierpcode,ing_suppliercity,ing_supplierstate,ing_suppliercountry,ing_confirmed,ing_status,ing_icode)values('$lastid','$ingredient_name','$ingredient_othername','$source_type','$supplier_origin','$ing_category','$ing_type','$ing_scheme','$ing_expiration','0',now(),'$adm','$supplier','$supplier_addr','$supplier_addr2','$supplier_addr3','$supplier_pcode','$supplier_city','$supplier_state','$supplier_addrcountry','1','3','$ing_icode')";
				$resinserting=mysqli_query($link,$inserting);
				if($resinserting){

					$sqlgetinginfo="select * from ingredient where ing_id='$lastid'";
					$resgetinginfo=mysqli_query($link,$sqlgetinginfo);
					$rowgetinginfo=mysqli_fetch_assoc($resgetinginfo);

					$sendData["status"]="200";
					$sendData["company_id"] = $rowcekclient['uid'];
					$sendData["company_regno"]= $rowcekclient['ic'];
					$sendData["company_email"]= $rowcekclient['mel'];
					$sendData["company_tel"]= $rowcekclient['tel'];
					$sendData["ehalal_regdate"] = $rowcekclient['regdt'];
					$sendData["ingredient_name"]=$rowgetinginfo['ing_name'];
					$sendData["ingredient_othername"]=$rowgetinginfo['ing_othername'];
					$sendData["ingredient_code"]=$rowgetinginfo['ing_id'];
					$sendData["ingredient_expiration"]=$rowgetinginfo['ing_expiration'];
					$sendData["ingredient_icode"]=$rowgetinginfo['ing_icode'];

				}
			}else{

				$sendData["status"]="406";
				$sendData["response"]="$regno Currently Not Registered";;

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