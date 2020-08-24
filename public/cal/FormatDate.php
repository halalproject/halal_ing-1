<?php
	/********************************************** 
	 *** Function to display date as DD/MM/YYYY ***
	 **********************************************/
	function DisplayDate($dtmDate){
		$year = substr($dtmDate, 0, 4); // returns YYYY
		$month = substr($dtmDate, 5, 2); // returns MM
		$day = substr($dtmDate, 8, 2); // returns DD
		if($day == '00' || $day == ''){
			$dtmDate = '';
		}else{			
			$dtmDate = $day."/".$month."/".$year;
		}
		return $dtmDate;
	}
	function DispDateBC($dtmDate){
		$year = substr($dtmDate, 0, 4); // returns YYYY
		$month = substr($dtmDate, 5, 2); // returns MM
		$day = substr($dtmDate, 8, 2); // returns DD
		//if($day == '00' || $day == ''){
		if($day == '00'){
			$dtmDate = 'date error';
		}else{			
			$dtmDate = $day."/".$month."/".$year;
		}
		return $dtmDate;
	}

	/********************************************************* 
	 *** Function to convert date to database (YYYY-MM-DD) ***
	 *********************************************************/
	function DBDate($dtmDate){
		if($dtmDate == ''){
			$dtmDate = '';
		}else{
			$year = substr($dtmDate, 6, 4); // returns YYYY
			$month = substr($dtmDate, 3, 2); // returns MM
			$day = substr($dtmDate, 0, 2); // returns DD
			$dtmDate = $year."-".$month."-".$day;
		}
		return $dtmDate;
	}
	
	function calc_age($age) { 
    $diff = (date("Y") - date("Y",$age)); 
    if (mktime(0,0,0,date("m",$age),date("j",$age),date("Y")) <= time()) 
        return $diff; 
    else 
        return $diff -1; 
	}
	
	function DispTime($dtmDate){
		$dtmDate = substr($dtmDate, 11, 8); // returns YYYY
		//$month = substr($dtmDate, 3, 2); // returns MM
		//$day = substr($dtmDate, 0, 2); // returns DD
		if($dtmDate=="00:00:00"){
			return '';
		} else {
			return $dtmDate;
		}
	} 

	function DisplayDateB($dtmDate){
		$year = substr($dtmDate, 0, 4); // returns YYYY
		$month = substr($dtmDate, 5, 2); // returns MM
		$day = substr($dtmDate, 8, 2); // returns DD
		if($day == '00' || $day == ''){
			$dtmDate = '';
		}else{			
			$dtmDate = $day." ".viewdate($month)." ".$year;
		}
		return $dtmDate;
	}

      function viewdate($month)  { // to show month in Bahasa
//		if($bahasa=='BM'){	  
            switch($month) {
				case '01' : $m = 'Januari'; break;
				case '02' : $m = 'Februari'; break;
				case '03' : $m = 'Mac'; break; 
				case '04' : $m = 'April'; break; 
				case '05' : $m = 'Mei'; break; 
				case '06' : $m = 'Jun'; break;
				case '07' : $m = 'Julai'; break;
				case '08' : $m = 'Ogos'; break;
				case '09' : $m = 'September'; break;
				case '10' : $m = 'Oktober'; break;
				case '11' : $m = 'November'; break;
				case '12' : $m = 'Disember'; break;
            }  return $m;
/*		 } else {
            switch($month) {
				case '01' : $m = 'January'; break;
				case '02' : $m = 'February'; break;
				case '03' : $m = 'March'; break; 
				case '04' : $m = 'April'; break; 
				case '05' : $m = 'May'; break; 
				case '06' : $m = 'June'; break;
				case '07' : $m = 'July'; break;
				case '08' : $m = 'August'; break;
				case '09' : $m = 'September'; break;
				case '10' : $m = 'October'; break;
				case '11' : $m = 'November'; break;
				case '12' : $m = 'Disember'; break;
		 }
			return $m;
		}
*/
      }  // end of show month

function SelDateDisp($dtmDate){
	$year = substr($dtmDate, 0, 4); // returns YYYY
	$month = substr($dtmDate, 5, 2); // returns MM
	$day = substr($dtmDate, 8, 2); // returns DD
	if($day == '00' || $day == ''){
		$dtmDate = '';
	}else{			
		$dtmDate = $day." ".SelMth($month)." ".$year;
	}
	return $dtmDate;
}
function SelMth($month)  { // to show month in Bahasa
		switch($month) {
			case '01' : $m = 'JAN'; break;
			case '02' : $m = 'FEB'; break;
			case '03' : $m = 'MAC'; break; 
			case '04' : $m = 'APR'; break; 
			case '05' : $m = 'MEI'; break; 
			case '06' : $m = 'JUN'; break;
			case '07' : $m = 'JUL'; break;
			case '08' : $m = 'OGOS'; break;
			case '09' : $m = 'SEPT'; break;
			case '10' : $m = 'OKT'; break;
			case '11' : $m = 'NOV'; break;
			case '12' : $m = 'DIS'; break;
		}  return $m;
}
?>