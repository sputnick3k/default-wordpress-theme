<?php
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////                        Getting Login IP's                               //////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
function cpo_get_ip_location($ip_Address)
{
	$apiCall = "http://tech-banker.com/tracker/LocateIp.php?ip_address=".$ip_Address;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiCall);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$jsonData = curl_exec($ch);
	return json_decode($jsonData);
}

if(!function_exists("getIpAddress"))
{
	function getIpAddress()
	{
		foreach (array("HTTP_CLIENT_IP", "HTTP_X_FORWARDED_FOR", "HTTP_X_FORWARDED", "HTTP_X_CLUSTER_CLIENT_IP", "HTTP_FORWARDED_FOR", "HTTP_FORWARDED", "REMOTE_ADDR") as $key)
		{
			if (array_key_exists($key, $_SERVER) === true)
			{
				foreach (explode(',', $_SERVER[$key]) as $ip)
				{
					return $ip = trim($ip);
				}
			}
		}
	}
}

if(!class_exists("log_data"))
{
	class log_data
	{
		function insert_data($tbl, $data)
		{
			global $wpdb;
			$wpdb->insert($tbl,$data);
		}
	}
}

if(isset($_REQUEST["wp-submit"]) || isset($_REQUEST["login"]))
{
	add_action ("wp_authenticate","check_custom_authentication",10,2);
	if(!function_exists("check_custom_authentication"))
	{
		function check_custom_authentication($username,$password)
		{
			global $wpdb;
			$setting_value = array();
			$date_time = date("Y-m-d H:i:s");
			$ip_Address = getIpAddress();
			$log_data = cpo_get_ip_location($ip_Address);
			$insert = new log_data();
			$setting_value["username"] = isset($_REQUEST["log"]) ? esc_attr($_REQUEST["log"]) : esc_attr($_REQUEST["username"]);
			$setting_value["ip_address"] = $ip_Address;
			if($log_data->city =="" || $log_data->country_name =="")
			{
				$setting_value["geo_location"] = $log_data->city.$log_data->country_name;
			}
			else
			{
				$setting_value["geo_location"] = $log_data->city.", ".$log_data->country_name;
			}
			$userdata = get_user_by("login", $username);
			if(wp_check_password($password, $userdata->user_pass))
			{
				$setting_value["login_status"] = 1;
			}
			else
			{
				$setting_value["login_status"] = 0;
			}
			$setting_value["latitude"] = $log_data->latitude;
			$setting_value["longitude"] = $log_data->longitude;
			$setting_value["date_time"] = $date_time;
			
			$insert->insert_data(cleanup_optimizer_log(),$setting_value);
		}
	}
}
?>