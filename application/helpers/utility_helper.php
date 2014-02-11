<?php 

	function theme_asset($path) {
		
		return base_url().'assets/public/'.$path;	
	}
	
	function admin_asset($path) {
		
		return base_url().'assets/admin/'.$path;	
	}
	
	function date_to_string($date) {
		
		//converting date to days or months (i.e Monday, Tuesday, November, October etc)
		if(isset($date) && !empty($date)) {
			
			$parse_time = strtotime($date);
			//$day = date('D', $parse_time);
			$month = date('F', $parse_time);
			//$parsed_date = $day.', '.$month;
			$parsed_date = $month;
			return ucwords(strtolower($parsed_date));
		}
		else {
			
			echo 'Date string is empty or Date is not properly sliced (formated)';
		}
	}
	
	function slice_date($datetime) {
		
		//cleaning datetime format to get only date formate (i.e 28-10-2001 etc)
		if(isset($datetime) && !empty($datetime)) {
			
			$dated = explode(' ', $datetime);
			return $dated[0];	
		}	
	}
	
	function slice_time($datetime) {
		
		//cleaning datetime format to get only date formate (i.e 28-10-2001 etc)
		if(isset($datetime) && !empty($datetime)) {
			
			$timed = explode(' ', $datetime);
			return $timed[1];	
		}	
	}
	
	function get_year($datetime) {
		
		//for getting year in number format out of datetime stamp
		if(isset($datetime) && !empty($datetime)) {
			
			$got_date = slice_date($datetime);
			$return_year = explode('-', $got_date);
			
			return $return_year[0]; 	
		}	
	}
	
	function get_day($datetime) {
		
		//for getting day in number format out of datetime stamp		
		if(isset($datetime) && !empty($datetime)) {
			
			$got_date = slice_date($datetime);
			$return_day = explode('-', $got_date);
			
			return end($return_day); 	
		}
	}
	
	function time_to_12hr($time) {
		
		// 24-hour time to 12-hour time 
		//$time_in_12_hour_format  = date("g:i a", strtotime("13:30"));
		// 12-hour time to 24-hour time 
		//$time_in_24_hour_format  = date("H:i", strtotime("1:30 PM"));
			
		return date("g:i a", strtotime($time)); 
	}
	
	function calculate_age($birthdate) {
		
		//Note: the date format should be for this function to work accurately is: mm/dd/yy
		//converting date format to the required dateformat (i.e mm/dd/yy)
		$birthdate = date("m-d-Y", strtotime($birthdate));
		
		//explode the date to get month, day and year
		$birthDate = explode('-', $birthdate);
		
		//get age from date or birthdate
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
		
		return $age;	
	}
	
	function get_client_browser($user_agent) {
	
	$browser = 'Unknown Browser';
	
	$browser_array = array(
	
		'/msie/i'       =>  'Microsoft Internet Explorer',
		'/firefox/i'    =>  'Mozilla Firefox',
		'/safari/i'     =>  'Apple Safari',
		'/chrome/i'     =>  'Google Chrome',
		'/opera/i'      =>  'Opera',
		'/netscape/i'   =>  'Netscape',
		'/maxthon/i'    =>  'Maxthon',
		'/konqueror/i'  =>  'Konqueror',
		'/mobile/i'     =>  'Handheld Browser'
	);
	
	foreach ($browser_array as $regex => $value) { 
	
		if (preg_match($regex, $user_agent)) {
		
			$browser = $value;
		}
	
	}
		return $browser;	
	}
			
	function get_client_os($user_agent) { 
		
		//getting client's browser
		$os_platform = "Unknown OS Platform";
	
		$os_array = array(
			'/windows nt 6.2/i'     =>  'Windows 8',
			'/windows nt 6.1/i'     =>  'Windows 7',
			'/windows nt 6.0/i'     =>  'Windows Vista',
			'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
			'/windows nt 5.1/i'     =>  'Windows XP',
			'/windows xp/i'         =>  'Windows XP',
			'/windows nt 5.0/i'     =>  'Windows 2000',
			'/windows me/i'         =>  'Windows ME',
			'/win98/i'              =>  'Windows 98',
			'/win95/i'              =>  'Windows 95',
			'/win16/i'              =>  'Windows 3.11',
			'/macintosh|mac os x/i' =>  'Mac OS X',
			'/mac_powerpc/i'        =>  'Mac OS 9',
			'/linux/i'              =>  'Linux',
			'/ubuntu/i'             =>  'Ubuntu',
			'/iphone/i'             =>  'iPhone',
			'/ipod/i'               =>  'iPod',
			'/ipad/i'               =>  'iPad',
			'/android/i'            =>  'Android',
			'/blackberry/i'         =>  'BlackBerry',
			'/webos/i'              =>  'Mobile'
		);
	
		foreach ($os_array as $regex => $value) { 
	
			if (preg_match($regex, $user_agent)) {
		
				$os_platform    =   $value;
			}
		}   
	
		return $os_platform;
	}
	
	function get_geo_location() {
		
		//get the overall location iformation about user
		$geo_location = file_get_contents('http://api.hostip.info/get_html.php?ip=');
	    //echo $geo_location;		
		
		// Reformat the data returned (Keep only country and country abbr.)
		$location_format = explode (' ', $geo_location);
		//echo '<br>'.'Country : '.$location_format[1].' '.substr($location_format[2],0,4);
		//echo '<br>'.'City : '.str_replace('IP:', '', $location_format[3]);
		//echo '<br>'.'IP : '.$location_format[4];
		$country = $location_format[1];
		$city = str_replace('IP:', '', $location_format[3]);
		$external_ip = $location_format[4];
		$location = $country.' '.$city.' '.$external_ip;
		
		return $location;
	}
	
	function first_word_capital($string) {
		
		return ucwords(strtolower($string));
	}
	
	function lower_case($string) {
		
		return strtolower($string);	
	}
	
	
?>