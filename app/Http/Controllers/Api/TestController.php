<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Ramuan;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function company()
    {
        $url = 'http://sistem.halal.gov.my/myehalal/admin_ingredient/get_company.php';
        //create a new cURL resource
        //setup request to send json via POST
        // $data = array(
        //     'uid' => '6776',
        //     'nama' => 'SekolahAASSSSSSS'
        // );
        
        $rs = Client::find(1);
        // $sqlp = "SELECT * FROM _sis_tblcomp_person WHERE fldpermohonan_id='HALAL-20170102-083753(PR)' AND fldcomp_cp_type='CP' AND fldcomp_cp_name IS NOT NULL";
        // $rscp = $conn->query($sqlp);
        // dd($rs);
        
        $name = $rs->company_name;
        $regno = $rs->company_reg_code;
        $typebusiness = $rs->company_type;
        $tel = $rs->company_tel;
        $email = $rs->company_email;
        $category = $rs->company_category;
        $address1 = $rs->company_address_1;
        $address2 = $rs->company_address_2;
        $address3 = $rs->company_address_3;
        $country = 'Malaysia'; //$rs->fldcomp_name;
        $postcode = $rs->company_poscode;
        $city = $rs->company_city;
        $state = $rs->company_state;
        $district = $rs->company_district;
        $officername = $rs->contact_name;
        $position = $rs->contact_position;
        $idno = $rs->contact_ic;
        $officermail = $rs->contact_email;
        $officerhp = $rs->contact_tel;
        
        if($typebusiness=='BS'){ $business='Bumiputra'; }
        else if($typebusiness=='NB'){ $business='Bukan Bumiputra'; }
        else if($typebusiness=='MA'){ $business='Milikan Asing'; }
        else { $business=''; }
        
        if($category=='ik'){ $kategori='ik'; }
        else if($category=='iks'){ $kategori='iks'; }
        else if($category=='multi'){ $kategori='multi'; }
        else if($category=='mi'){ $kategori='mikro'; }
        else { $kategori=''; }
        
        $data = array(
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
        );
        
        // $data = '{
        //     "authkey":"Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6",
        //     "name":"'.$name.'",
        //     "regno":"'.$regno.'",
        //     "typebusiness":"'.$business.'",
        //     "tel":"'.$tel.'",
        //     "email":"'.$email.'",
        //     "category":"'.$kategori.'",
        //     "address1":"'.$address1.'",
        //     "address2":"'.$address2.'",
        //     "address3":"'.$address3.'",
        //     "country":"Malaysia",
        //     "postcode":"'.$postcode.'",
        //     "city":"'.$city.'",
        //     "state":"'.$state.'",
        //     "district":"'.$district.'",
        //     "officername":"'.$officername.'",
        //     "position":"'.$position.'",
        //     "idno":"'.$idno.'",
        //     "officermail":"'.$officermail.'",
        //     "officerhp":"'.$officerhp.'"
        // }';
        
        //print_r($data); print "<br>";
        
        // halal_json($url, $data);
        
        $ch = curl_init('http://sistem.halal.gov.my/myehalal/admin_ingredient/get_company.php');

        if(!empty($ch)){
            $payload = json_encode(array("data" => $data));
            // dd($data);
            //$payload = http_build_query(array("data" => $data));
            //attach encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute the POST request
            $result = curl_exec($ch);
            //close cURL resource
            curl_close($ch);
            
            return $result;
            
        } else {
            /*$conn->execute("INSERT INTO test_send(ip, data, createdt, status, hasil, ch, oleh) 
            VALUES('{$ip}','{$val}', '{$datecr}', '{$tindakan}', 'GAGAL', ".tosql($ch).", '{$by}')");
            return 'Tiada tindakan';*/
        } //exit;
    }
    
    public function ramuan($id)
    {
        // dd('hello');
        $url = 'http://sistem.halal.gov.my/myehalal/admin_ingredient/get_company.php';
        $rs = Ramuan::find($id);
        
        $ing_kod = $rs->ing_kod;
        $nama_ramuan = $rs->nama_ramuan;
        $nama_saintifik = $rs->nama_saintifik;
        $sumber_bahan_id = $rs->sumber_bahan_id;
        $ing_category = $rs->ing_category;
        $ing_type = $rs->ing_type;
        $ing_scheme = $rs->ing_scheme;
        $ing_remark = $rs->ing_remark;
        $status = $rs->status;
        $negara_pengilang_id = $rs->negara_pengilang_id;
        $nama_pengilang = $rs->nama_pengilang;
        $alamat_pengilang_1 = $rs->alamat_pengilang_1;
        $alamat_pengilang_2 = $rs->alamat_pengilang_2;
        $alamat_pengilang_3 = $rs->alamat_pengilang_3;
        $poskod_pengilang = $rs->poskod_pengilang;
        $negeri_pembekal_id = $rs->negeri_pembekal_id;
        $nama_pembekal = $rs->nama_pembekal;
        $alamat_pembekal_1 = $rs->alamat_pembekal_1;
        $alamat_pembekal_2 = $rs->alamat_pembekal_2;
        $alamat_pembekal_3 = $rs->alamat_pembekal_3;
        $poskod_pembekal = $rs->poskod_pembekal;
        $is_sijil = $rs->is_sijil;
        $tarikh_tamat_sijil = $rs->tarikh_tamat_sijil;
        $tarikh_buka = $rs->tarikh_buka;
        $is_semak = $rs->is_semak;
        $is_semak_by = $rs->is_semak_by;
        $tkh_semak = $rs->tkh_semak;
        $is_lulus = $rs->is_lulus;
        $is_lulus_by = $rs->is_lulus_by;
        $tkh_lulus = $rs->tkh_lulus;
        $creat_dt = $rs->creat_dt;
        $create_by = $rs->create_by;
        $update_dt = $rs->update_dt;
        $update_by = $rs->update_by;
        $is_delete = $rs->is_delete;
        $delete_comment = $rs->delete_comment;
        $delete_dt = $rs->delete_dt;
        $delete_by = $rs->delete_by;
        $tmp = $rs->tmp;
        $ing_icode = $rs->ing_icode;
        
        $data = array(
            'authkey' => 'Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6',
            'ing_kod' => $ing_kod,
            'nama_ramuan' => $nama_ramuan,
            'nama_saintifik' => $nama_saintifik,
            'sumber_bahan_id' => $sumber_bahan_id,
            'ing_category' => $ing_category,
            'ing_type' => $ing_type,
            'ing_scheme' => $ing_scheme,
            'ing_remark' => $ing_remark,
            'status' => $status,
            'negara_pengilang_id' => $negara_pengilang_id,
            'nama_pengilang' => $nama_pengilang,
            'alamat_pengilang_1' => $alamat_pengilang_1,
            'alamat_pengilang_2' => $alamat_pengilang_2,
            'alamat_pengilang_3' => $alamat_pengilang_3,
            'poskod_pengilang' => $poskod_pengilang,
            'negeri_pembekal_id' => $negeri_pembekal_id,
            'nama_pembekal' => $nama_pembekal,
            'alamat_pembekal_1' => $alamat_pembekal_1,
            'alamat_pembekal_2' => $alamat_pembekal_2,
            'alamat_pembekal_3' => $alamat_pembekal_3,
            'poskod_pembekal' => $poskod_pembekal,
            'is_sijil' => $is_sijil,
            'tarikh_tamat_sijil' => $tarikh_tamat_sijil,
            'tarikh_buka' => $tarikh_buka,
            'is_semak' => $is_semak,
            'is_semak_by' => $is_semak_by,
            'tkh_semak' => $tkh_semak,
            'is_lulus' => $is_lulus,
            'is_lulus_by' => $is_lulus_by,
            'tkh_lulus' => $tkh_lulus,
            'creat_dt' => $creat_dt,
            'create_by' => $create_by,
            'update_dt' => $update_dt,
            'update_by' => $update_by,
            'is_delete' => $is_delete,
            'delete_comment' => $delete_comment,
            'delete_dt' => $delete_dt,
            'delete_by' => $delete_by,
            'tmp' => $tmp,
            'ing_icode' => $ing_icode,
        );
        
        // $data = '{
        //     "authkey":"Nstov5/TSr++L58ZxfXDhSuu7fy5QWb6",
        //     "name":"'.$name.'",
        //     "regno":"'.$regno.'",
        //     "typebusiness":"'.$business.'",
        //     "tel":"'.$tel.'",
        //     "email":"'.$email.'",
        //     "category":"'.$kategori.'",
        //     "address1":"'.$address1.'",
        //     "address2":"'.$address2.'",
        //     "address3":"'.$address3.'",
        //     "country":"Malaysia",
        //     "postcode":"'.$postcode.'",
        //     "city":"'.$city.'",
        //     "state":"'.$state.'",
        //     "district":"'.$district.'",
        //     "officername":"'.$officername.'",
        //     "position":"'.$position.'",
        //     "idno":"'.$idno.'",
        //     "officermail":"'.$officermail.'",
        //     "officerhp":"'.$officerhp.'"
        // }';
        
        //print_r($data); print "<br>";
        
        // halal_json($url, $data);
        
        $ch = curl_init('http://sistem.halal.gov.my/myehalal/admin_ingredient/get_ingredient.php');

        if(!empty($ch)){
            $payload = json_encode(array("data" => $data));
            // dd($data);
            //$payload = http_build_query(array("data" => $data));
            //attach encoded JSON string to the POST fields
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
            //set the content type to application/json
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //execute the POST request
            $result = curl_exec($ch);
            //close cURL resource
            curl_close($ch);
            
            return $result;
            
        } else {
            /*$conn->execute("INSERT INTO test_send(ip, data, createdt, status, hasil, ch, oleh) 
            VALUES('{$ip}','{$val}', '{$datecr}', '{$tindakan}', 'GAGAL', ".tosql($ch).", '{$by}')");
            return 'Tiada tindakan';*/
        } //exit;
    }
}
