<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
@include('api/halal_integrasi')
<?php

//$conn->debug=true;
$sql = "SELECT * FROM _sis_tblcomp A, _sis_tblpermohonan B WHERE A.fldcomp_code=B.fldcomp_code AND B.fldmohon_id='HALAL-20170102-083753(PR)'";
$rs = $conn->query($sql);
$sqlp = "SELECT * FROM _sis_tblcomp_person WHERE fldpermohonan_id='HALAL-20170102-083753(PR)' AND fldcomp_cp_type='CP' AND fldcomp_cp_name IS NOT NULL";
$rscp = $conn->query($sqlp);


$name = $rs->fields['fldcomp_name'];
$regno = $rs->fields['fldcomp_reg'];
$typebusiness = $rs->fields['fldcomp_bumi'];
$tel = $rs->fields['fldcomp_telno'];
$email = $rs->fields['fldcomp_email'];
$category = $rs->fields['fldcomp_industry'];
$address1 = $rs->fields['fldcomp_add1'];
$address2 = $rs->fields['fldcomp_add2'];
$address3 = $rs->fields['fldcomp_add3'];
$country = 'Malaysia'; //$rs->fields['fldcomp_name'];
$postcode = $rs->fields['fldcomp_poskod'];
$city = $rs->fields['fldcomp_bandar_nama'];
$state = dlookup("ref_state","fldstatedesc","fldstateID=".tosql($rs->fields['fldcomp_negeri']));
$district = dlookup("ref_state_dist","fldDistrictName","fldDistrictID=".tosql($rs->fields['fldcomp_bandar']));
$officername = $rscp->fields['fldcomp_cp_name'];
$position = $rscp->fields['fldcomp_cp_desig'];
$idno = $rscp->fields['fldcomp_cp_ic'];
$officermail = $rscp->fields['fldcomp_cp_email'];
$officerhp = $rscp->fields['fldcomp_cp_tel'];

if($typebusiness=='BS'){ $business='Bumiputra'; }
else if($typebusiness=='NB'){ $business='Bukan Bumiputra'; }
else if($typebusiness=='MA'){ $business='Milikan Asing'; }
else { $business=''; }

if($category=='ik'){ $kategori='ik'; }
else if($category=='iks'){ $kategori='iks'; }
else if($category=='multi'){ $kategori='multi'; }
else if($category=='mi'){ $kategori='mikro'; }
else { $kategori=''; }

/*$data = array(
	'authkey' => 'Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6',
	'name' => $name,
	'regno' => $regno,
	'typebusiness' => $business,
	'tel' => $tel,
	'email' => $email,
	'category' => $kategori,
	'address1' => $address1,
	'address2' => $address2,
	'address3' => $address3,
	'country' => $country,
	'postcode' => $postcode,
	'city' => $city,
	'state' => $state,
	'district' => $district,
	'officername' => $officername,
	'position' => $position,
	'idno' => $idno,
	'officermail' => $officermail,
	'officerhp' => $officerhp
);*/

$data = '{
	"authkey":"Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6",
	"name":"'.$name.'",
	"regno":"'.$regno.'",
	"typebusiness":"'.$business.'",
	"tel":"'.$tel.'",
	"email":"'.$email.'",
	"category":"'.$kategori.'",
	"address1":"'.$address1.'",
	"address2":"'.$address2.'",
	"address3":"'.$address3.'",
	"country":"Malaysia",
	"postcode":"'.$postcode.'",
	"city":"'.$city.'",
	"state":"'.$state.'",
	"district":"'.$district.'",
	"officername":"'.$officername.'",
	"position":"'.$position.'",
	"idno":"'.$idno.'",
	"officermail":"'.$officermail.'",
	"officerhp":"'.$officerhp.'"
}';


//print_r($data); print "<br>";

$datas = ingredient_json('company', $data, "COMPANY");

//print_r($datas);
// $status=substr($datas,11,3);
// $conn->execute("INSERT INTO _view_integrasi(types, tarkkh, status, mesej) VALUES('C', ".tosql(date("Y-m-d H:i:s")).", ".tosql($status).", ".tosql($datas).")");
?>
</body>
</html>