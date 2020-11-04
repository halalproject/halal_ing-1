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
$sql = "SELECT B.fldci_material, B.fldci_material_cn, B.fldci_manuf_name, B.fldci_manuf_add, B.fldci_halal_stat, B.fldci_tarikh, B.fldci_source, B.fldci_negara, B.flding_id,  
	C.fldmohon_borang, C.fldcomp_code, D.fldcomp_reg, D.fldcomp_code
	FROM _sis_tblcomp_ingredient A, _sis_tblcomp_ingredient_list B, _sis_tblpermohonan C, _sis_tblcomp D   
	WHERE A.flding_id=B.flding_id AND A.fldpermohon_id=C.fldmohon_id AND C.fldcomp_code=D.fldcomp_code AND C.fldmohon_id='HALAL-20161025-140213(PR)'";
$rs = $conn->query($sql);

$company_id = $rs->fields['fldcomp_code'];
$regno = $rs->fields['fldcomp_reg'];
$ingredient_name = $rs->fields['fldci_material'];
$ingredient_othername = $rs->fields['fldci_material_cn'];
$fldci_source = $rs->fields['fldci_source'];
$supplier = $rs->fields['fldci_manuf_name'];
$supplier_origin = dlookup("tblcountry","fldcountry","fldcountry_id=".tosql($rs->fields['fldci_negara']));
$supplier_addr = $rs->fields['fldci_manuf_add'];
$supplier_addr2 = $rs->fields['fldcomp_add3'];
$supplier_addr3 = $rs->fields['fldci_negara'];
$distributor_name = $rs->fields['fldcomp_bandar_nama'];
$borang = $rs->fields['fldmohon_borang']; //ing_scheme
$source_type = '2'; //$rs->fields['fldjawatan'];
$ing_type = '2'; //$rs->fields['fldcomp_name'];
$ing_expiration = $rs->fields['fldci_tarikh'];
//$ing_expiration='2021-01-16';
$icode=$rs->fields['flding_id'];

if($fldci_source=='1'){ $ing_category='C001'; }
else if($fldci_source=='2'){ $ing_category='C002'; }
else if($fldci_source=='3'){ $ing_category='C003'; }
else if($fldci_source=='4'){ $ing_category='C004'; }
else if($fldci_source=='5'){ $ing_category='C005'; }



if($borang=='PR'){ $ing_scheme='S001'; }
else if($borang=='PE'){ $ing_scheme='S002'; }
else if($borang=='BG'){ $ing_scheme='S003'; }
else if($borang=='FM'){ $ing_scheme='S004'; }
else if($borang=='KO'){ $ing_scheme='S005'; }
else if($borang=='OEM'){ $ing_scheme='S006'; }
else if($borang=='MD'){ $ing_scheme='S007'; }
else if($borang=='KU'){ $ing_scheme='S008'; }


if(empty($supplier_origin)){ $supplier_origin='MYS'; }
//$regno='C00005';
//$company_id='';
$supplier_addr = str_replace("\n", '', $supplier_addr); // remove new lines
$supplier_addr = str_replace("\r", '', $supplier_addr); // remove carriage returns

$supplier_addr2 = str_replace("\n", '', $supplier_addr2); // remove new lines
$supplier_addr2 = str_replace("\r", '', $supplier_addr2); // remove carriage returns

$supplier_addr3 = str_replace("\n", '', $supplier_addr3); // remove new lines
$supplier_addr3 = str_replace("\r", '', $supplier_addr3); // remove carriage returns

$data = array(
	'authkey' => 'Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6',
	'company_id' => $company_id,
	'regno' => $regno,
	'ingredient_name' => $ingredient_name,
	'ingredient_othername' => $ingredient_othername,
	'ing_category' => $ing_category,
	'supplier' => $supplier,
	'supplier_origin' => $supplier_origin,
	'supplier_addr' => $supplier_addr,
	'supplier_addr2' => $supplier_addr2,
	'supplier_addr3' => $supplier_addr3,
	'distributor_name' => $supplier, 
	'ing_scheme' => $ing_scheme,
	'source_type' => $source_type,
	'ing_type' => $ing_type,
	'ing_expiration' => $ing_expiration
);

$data = '{
	"authkey":"Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6",
	"company_id":"'.$company_id.'",
	"regno":"'.$regno.'",
	"ingredient_name":"'.$ingredient_name.'",
	"ingredient_othername":"'.$ingredient_othername.'",
	"ing_category":"'.$ing_category.'",
	"supplier":"'.$supplier.'",
	"supplier_origin":"'.$supplier_origin.'",
	"supplier_addr":"'.$supplier_addr.'",
	"supplier_addr2":"'.$supplier_addr2.'",
	"supplier_addr3":"'.$supplier_addr3.'",
	"distributor_name":"'.$supplier.'", 
	"ing_scheme":"'.$ing_scheme.'",
	"source_type":"'.$source_type.'",
	"ing_type":"'.$ing_type.'",
	"ing_expiration":"'.$ing_expiration.'",
	"icode":"'.$icode.'" 
}';


print_r($data);
//print "<br>";
$datas = ingredient_json('produk', $data, "PRODUK");

print_r($datas);
$status=substr($datas,11,3);
$conn->execute("INSERT INTO _view_integrasi(types, tarkkh, status, mesej) VALUES('P',".tosql(date("Y-m-d H:i:s")).", ".tosql($status).", ".tosql($datas).")");


?>
</body>
</html>