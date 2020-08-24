<?php 
include_once 'DatePicker.php';
$href_cal = base64_encode('3;peg_bertugas/cal_view.php');
$href_add = base64_encode('3;peg_bertugas/add_pegawai.php');
$href_add1 = base64_encode('3;peg_bertugas/pegawai_add.php');
?>

<Script type="text/javascript" Language="JavaScript">
	function getSelDate(SelDate){
		var frm,txt;
		frm = '<?php echo  "$frm" ?>';
		txt = '<?php echo  "$txt" ?>';
		window.opener.document.forms[frm].elements[txt].value = SelDate;
		window.close();
	} 
	function do_get(href){
		var mth,yr;
		mth = document.frm.sel_mth.value;
		yr = document.frm.sel_year.value; //<a href=cal_view.php?nextMonth=<?=$nextMonth;?>&curYear=<?=$nextYear;?>&p=NEXT&type=ACT>&gt;&gt;</a>
		document.frm.action = href + "&nextMonth="+mth+"&curYear="+yr+"&p=NEXT";
		document.frm.submit();
	} 

	/*function open_jadual(ty,mth,yr,bil){
		if(bil==0){
			if(ty=='C'){
				alert("Tiada kakitangan bercuti pada bulan ini.");
			} else {
				alert("Tiada kakitangan bekerja di luar kawasan pada bulan ini.");
			}
		} else {
			var URL = "cal_view1.php?ty="+ty+"&mth="+mth+"&yr="+yr;
			window.open(URL,'About','top=100,left=200,width=700,height=550,scrollbars=1;menubar=0,status=0,toolbar=0,resizeable=0');
		}
	}*/
	function do_add(href, id){
		//alert(href);
		//alert(id);
		document.frm.action = "index.php?data="+href;
		document.frm.target = '_self';
		document.frm.submit();
	}
</Script>
<script type="text/javascript" src="peg_bertugas/cal/script/wz_tooltip.js"></script>
<script type="text/javascript" src="peg_bertugas/cal/script/tip_balloon.js"></script>
<?php
$p=$_GET['p'];
$objKalendar = new KalendarDP();

if(!empty($_POST['sel_year'])){
	$objKalendar->setYear($_POST['sel_year']);//Set current year to prev year
	$yr = $_POST['sel_year'];
} else {
	if (!empty($_GET['prevYear'])){
		$objKalendar->setYear($_GET['prevYear']);//Set current year to prev year
		$yr = $_GET['prevYear'];
	}elseif (!empty($_GET['nextYear'])){
		$objKalendar->setYear($_GET['nextYear']);//Set current year to next year
		$yr = $_GET['nextYear'];
	}elseif(!empty($_GET['curYear'])){
		$objKalendar->setYear(($_GET['curYear']));
		$yr = $_GET['curYear'];
	}else{	
		$objKalendar->setYear(date("Y"));//Set default year
		$yr = date("Y");
	}
}

if(!empty($_POST['sel_mth'])){
	$objKalendar->setMonth($_POST['sel_mth']);//Set current year to prev year
	$mth = $_POST['sel_mth'];
} else {
	if(!empty($_GET['prevMonth'])){
		$objKalendar->setMonth(($_GET['prevMonth']));//Set current month to prev month
		$mth = $_GET['prevMonth'];
	}elseif(!empty($_GET['nextMonth'])){
		$objKalendar->setMonth(($_GET['nextMonth']));//Set current month to next month
		$mth = $_GET['nextMonth'];
	}else{	
		$objKalendar->setMonth(date("m")); //Set default month
		$mth = date("m");
	}
}

//Variables for calendar
$intDays = 1; //Start to end day of the month
$intAllDays = 0; //All days (35 days)

$intDayInMonth = $objKalendar->getDaysInMonth();//Get days in month (28-31)
$intStartDayOfMonth = $objKalendar->getFirstDayOfMonth();//Get start day of the month (0-6)
$intYear = $objKalendar->getYear();//Get year
$strLongMonth = $objKalendar->getLongMonth();//Get Long Month eg: September
$strLongMonth1 = $objKalendar->getLongMonth();//Get Long Month eg: September
$intMonth = $objKalendar->getMonth();

$d=date("d")-0;
$m=date("m")-0;
$y=date("Y");

$hourdiff = "0";
$timeadjust = ($hourdiff * 60 * 60);
$melbdate = date("Y-m-d h:i a",time() + $timeadjust);
//$Today = substr($melbdate,8,2)."/".substr($melbdate,5,2)."/".substr($melbdate,0,4);
$Today = date("d/m/Y");
$curr_date = date("Y-m-d");
$curr_dt = date("d");
$curr_mt = date("m");

if($intMonth==1){
	$prevYear = $intYear - 1;  
	$prevMonth = $intMonth - 1; 
	if ($prevMonth % 12 == 0){
		$prevMonth = 12;
		$intYear = $intYear;
	}
} else {
	$prevYear = $intYear;  
	$prevMonth = $intMonth - 1; 
	if ($prevMonth % 12 == 0){
		$prevMonth = 12;
		$intYear = $intYear;
	}
}

  $nextMonth = $intMonth + 1; 
  if ($nextMonth % 13 == 0){
	$nextMonth = 1;
	$nextYear = $intYear + 1;
  } else {
	$nextYear = $intYear;
  }	
  
?>

<div align="center">
<table width="100%" border="1" cellspacing="0" cellpadding="5" class="headline_box">
	<tr><td colspan="7" bgcolor="#B9CAE6">
		<table width=100% border="0" style="height:50px">
		  <tr> 
			 <td valign="middle" nowrap width="20%"align="left">&nbsp;
			 	<a href="<?=$actual_link;?>&prevMonth=<?=$prevMonth;?>&curYear=<?=$prevYear;?>&p=PREV">
                <img src="images/arrow_left.gif" title="Sila klik untuk paparan bulan terdahulu" /></a>
			</td>
			<td valign="middle" width="100%" align="left">
				<div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">
                <div class="col-md-3 col-xm-3">
				<select name="sel_mth" class="form-control" onchange="do_page('<?=$actual_link;?>')">
					<option value="1" <?php if($mth=='1'){ echo 'selected'; } ?>>Januari</option>
					<option value="2" <?php if($mth=='2'){ echo 'selected'; } ?>>Februari</option>
					<option value="3" <?php if($mth=='3'){ echo 'selected'; } ?>>Mac</option>
					<option value="4" <?php if($mth=='4'){ echo 'selected'; } ?>>April</option>
					<option value="5" <?php if($mth=='5'){ echo 'selected'; } ?>>May</option>
					<option value="6" <?php if($mth=='6'){ echo 'selected'; } ?>>Jun</option>
					<option value="7" <?php if($mth=='7'){ echo 'selected'; } ?>>Julai</option>
					<option value="8" <?php if($mth=='8'){ echo 'selected'; } ?>>Ogos</option>
					<option value="9" <?php if($mth=='9'){ echo 'selected'; } ?>>September</option>
					<option value="10" <?php if($mth=='10'){ echo 'selected'; } ?>>Oktober</option>
					<option value="11" <?php if($mth=='11'){ echo 'selected'; } ?>>November</option>
					<option value="12" <?php if($mth=='12'){ echo 'selected'; } ?>>Disember</option>
				</select>
                </div>
				<div class="col-md-3 col-xm-3">
				<select name="sel_year" class="form-control" onchange="do_page('<?=$actual_link;?>')">
                <?php for($t=date("Y")+1;$t>=2008;$t--){ ?>
					<option value="<?=$t;?>" <?php if($yr==$t){ echo 'selected'; } ?>><?=$t;?></option>
                <?php } ?>    
				</select>
                </div>
                <div class="col-md-3">
                <input type="button" value="Cetak Jadual" style="cursor:pointer" class="form-control btn btn-primary" 
                onClick="do_cetak('peg_bertugas/cetak_peg_view.php?pro=BLN')" />
                </div>
				</font></div>
			</td>
			<td valign="middle" nowrap width="20%" align="right">
			  <a href="<?=$actual_link;?>&nextMonth=<?=$nextMonth;?>&curYear=<?=$nextYear;?>&p=NEXT">
              <img src="images/arrow_right.gif" title="Sila klik untuk paparan bulan kehadapan" /></a>&nbsp;
			</td>
		  </tr>
	</table></td></tr>

  <tr class=tablebg style="height:40px"> 
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">Ahad</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Isnin</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Selasa</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Rabu</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Khamis</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#000000">Jumaat</font></b></div></td>
    <td width="14%"><div align="center"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">Sabtu</font></b></div></td>
  </tr>
<?php
  // UNTUK SENARAI KURSUS
  $cuti=0;
  $kerja=0;
  $iSPertama = 0;
  for($i=0;$i<6;$i++){
	  echo "<tr class=cal_bg>"; 
		for($j=0;$j<7;$j++){
			if($j==0 || $j==6){
				echo  '<td height="60" valign="top" class="Days">';
			}else{
				echo  '<td height=60 valign=top class=Days>';
			}
			if($intAllDays >= $intStartDayOfMonth && $intDays <= $intDayInMonth){
				$intMonth = $intMonth - 0;
				$selDate = FormatDate($intDays,$intMonth,$intYear,"DD/MM/YYYY");	
		
			   if($j==0 || $j==5 || $j==6){ 
					if($intDays == $curr_dt && $intMonth == $curr_mt){
						echo '<table width=100% bgcolor=#B9CAE6 border=0><tr><td title=Today style="cursor:pointer;padding-left:5px;padding-right:5px;" align=left>
							<font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red><b><i>'.$intDays.'</i></b></font>'; 
					} else {
						echo '<table width=100%><tr><td align=left style="padding-left:5px;padding-right:5px;">
							<font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red>'.$intDays.'</font>'; 
					}
					if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
					if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }		
					$dateDisp = "$intYear-$month-$day";
					
					$sSQL ="";
					//$sSQL="SELECT * FROM jadual_tugas WHERE jad_tkh = '$dateDisp'";
					$sSQL="SELECT A.*, B.j_dewan FROM jadual_tugas A, kod_sidang B 
					WHERE A.id_sidang=B.id_sidang AND A.is_deleted=0 AND A.jad_tkh=".tosql($dateDisp,"Text")." AND B.status=0";
					$result = $conn->query($sSQL);
					while(!$result->EOF){
						$jad_id = $result->fields['jad_id'];
						//print "&nbsp;&nbsp;<br><img src=\"images/edit.png\" style=\"cursor:pointer\" title=\"Sila klik untuk mengemaskini nama pegawai.\" 
						//onclick=\"open_win('peg_bertugas/add_pegawai.php','$jad_id')\"> - <u>$dewan</u></a>";
						//}
						print '<font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000">';
						if(!empty($result->fields['pegawai1'])){ print "<br>P1- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai1'],"Number")); }
						if(!empty($result->fields['pegawai2'])){ print "<br>P2- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai2'],"Number")); }
						if(!empty($result->fields['pegawai3'])){ print "<br>P3- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai3'],"Number")); }
						print "<br>";
						if(!empty($result->fields['urusetia'])){ print "<br>UR- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['urusetia'],"Number")); }
						if(!empty($result->fields['pemandu'])){ print "<br>PE- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pemandu'],"Number")); }
						print '</font><br>';
						$result->movenext();
					}
					echo "</td></tr></table>";
				} else {
					if($intDays == $curr_dt  && $intMonth == $curr_mt){
						echo '<table width=100% bgcolor=#B9CAE6 border=0><tr><td title=Today style="cursor:pointer;padding-left:5px;padding-right:5px;" align=left>
							<font size=1 face=Verdana, Arial, Helvetica, sans-serif color=red><b><i>'.$intDays.'</i></b></font>'; 
						if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
						if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }		
						$dateDisp = "$intYear-$month-$day";

						$sSQL ="";
						//$sSQL="SELECT * FROM jadual_tugas WHERE jad_tkh = '$dateDisp'";
						$sSQL="SELECT A.*, B.j_dewan, C.dewan FROM jadual_tugas A, kod_sidang B, kod_dewan C 
						WHERE A.id_sidang=B.id_sidang AND B.j_dewan=C.j_dewan AND A.is_deleted=0 AND A.jad_tkh=".tosql($dateDisp,"Text")." AND B.status=0";
						$result = $conn->query($sSQL);
						while(!$result->EOF){
							$jad_id = $result->fields['jad_id'];
							$dewan = $result->fields['dewan'];

							print '&nbsp;&nbsp;<br><a href="peg_bertugas/view_pegawai.php?id='.$jad_id.'" data-toggle="modal" data-target="#myModal"  
                            	title="Paparan maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana"><u><b>'.$dewan.'</b></u></a>'; 
							//}
							print '<font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000">';
							if(!empty($result->fields['pegawai1'])){ print "<br>P1- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai1'],"Number")); }
							if(!empty($result->fields['pegawai2'])){ print "<br>P2- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai2'],"Number")); }
							if(!empty($result->fields['pegawai3'])){ print "<br>P3- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai3'],"Number")); }
							print "<br>";
							if(!empty($result->fields['urusetia'])){ print "<br>UR- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['urusetia'],"Number")); }
							if(!empty($result->fields['pemandu'])){ print "<br>PE- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pemandu'],"Number")); }
							print '</font><br>';
							$result->movenext();
						}
						echo "</td></tr></table>";
					}else{
						if (strlen($intDays)<2)	{$day = "0" . $intDays;} else { $day = $intDays;}
						if (strlen($intMonth)<2) {$month = "0" . $intMonth;} else { $month = $intMonth; }		
						$dateDisp = "$intYear-$month-$day";
						echo '<table width=100%><tr><td align=left style="padding-left:5px;padding-right:5px;">
							<font size=1 face=Verdana, Arial, Helvetica, sans-serif color=#000000>'.$intDays.'</font>';

						$sSQL ="";
						//$sSQL="SELECT * FROM jadual_tugas WHERE jad_tkh = '$dateDisp'";
						$sSQL="SELECT A.*, B.j_dewan, C.dewan FROM jadual_tugas A, kod_sidang B, kod_dewan C 
						WHERE A.id_sidang=B.id_sidang AND B.j_dewan=C.j_dewan AND A.is_deleted=0 AND A.jad_tkh=".tosql($dateDisp,"Text")." AND B.status=0";
						$result = $conn->query($sSQL);
						//print $sSQL;
						while(!$result->EOF){
							$jad_id = $result->fields['jad_id'];
							$dewan = $result->fields['dewan'];
							print '&nbsp;&nbsp;<br><a href="peg_bertugas/view_pegawai.php?id='.$jad_id.'" data-toggle="modal" data-target="#myModal"  
                            	title="Paparan maklumat pegawai bertugas" class="fa" data-backdrop="static" style="font-family:verdana"><u><b>'.$dewan.'</b></u></a>'; 
							//}
							print '<font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000">';
							if(!empty($result->fields['pegawai1'])){ print "<br>P1- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai1'],"Number")); }
							if(!empty($result->fields['pegawai2'])){ print "<br>P2- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai2'],"Number")); }
							if(!empty($result->fields['pegawai3'])){ print "<br>P3- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pegawai3'],"Number")); }
							print "<br>";
							if(!empty($result->fields['urusetia'])){ print "<br>UR- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['urusetia'],"Number")); }
							if(!empty($result->fields['pemandu'])){ print "<br>PE- " . dlookup("kakitangan","nama_kakitangan","id_kakitangan=".tosql($result->fields['pemandu'],"Number")); }
							print '</font><br>';
							$result->movenext();
						}
						echo "</td></tr></table>";
					}
				}
			$intDays = $intDays + 1;
			}
			echo "</td>";
		$intAllDays = $intAllDays + 1;
		}
	  echo "</tr>";
  }
  ?>
        <td colspan="7" align="center" bgcolor="#B9CAE6">
            <font size=1 face=Verdana, Arial, Helvetica, sans-serif color="#000000"><b>
            Today: 
			<?php 
				$dateDayDesc = date("D");
				$dateDay = date("d");
				$dateYear = date("Y");
				$dateMth = date("M");
				
				if($dateDayDesc=='Sun'){ $dateDayDesc='Ahad'; }
				else if($dateDayDesc=='Mon'){ $dateDayDesc='Isnin'; }
				else if($dateDayDesc=='Tue'){ $dateDayDesc='Selasa'; }
				else if($dateDayDesc=='Wed'){ $dateDayDesc='Rabu'; }
				else if($dateDayDesc=='Thu'){ $dateDayDesc='Khamis'; }
				else if($dateDayDesc=='Fri'){ $dateDayDesc='Jumaat'; }
				else if($dateDayDesc=='Sat'){ $dateDayDesc='Sabtu'; }

				if($dateMth=='Jan'){ $dateMth='Januari'; }
				else if($dateMth=='Feb'){ $dateMth='Februari'; }
				else if($dateMth=='Mar'){ $dateMth='Mac'; }
				else if($dateMth=='Apr'){ $dateMth='April'; }
				else if($dateMth=='May'){ $dateMth='Mei'; }
				else if($dateMth=='Jun'){ $dateMth='Jun'; }
				else if($dateMth=='Jul'){ $dateMth='Julai'; }
				else if($dateMth=='Aug'){ $dateMth='Ogos'; }
				else if($dateMth=='Sept'){ $dateMth='September'; }
				else if($dateMth=='Oct'){ $dateMth='Oktober'; }
				else if($dateMth=='Nov'){ $dateMth='November'; }
				else if($dateMth=='Dec'){ $dateMth='Disember'; }
				
				echo "$dateDayDesc, $dateDay $dateMth $dateYear"; 
			?>
            </b></font>
        </td>
    </tr>
</table>
</div>
