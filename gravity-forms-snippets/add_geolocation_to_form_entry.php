<?php
// TODO: 
// Can be made more readible and easier to maintain by getting a field's value by it's label.
// Documentation for this found at https://kayart.dev/gravity-forms-how-to-get-a-fields-value-by-its-label/

add_filter('gform_entry_post_save', 'post_save', 1, 2);
function post_save($entry, $form) {
	$form_ids = array(1,2,4,7,8,9,13);
	//if the form ID isn't one of the ones we have specified
	//return without doing anything
	if(!in_array($form['id'], $form_ids)) 
		return $entry;
	
	switch ($form['id']) {
		case '1':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['16.3'] = $data->city;
				gform_update_meta($entry['id'], '16.3', $data->city);
				$entry['16.4'] = $data->state;
				gform_update_meta($entry['id'], '16.4', $data->state);
				$entry['16.5'] = $data->postal;
				gform_update_meta($entry['id'], '16.5', $data->postal);
				$entry['16.6'] = $data->country;
				gform_update_meta($entry['id'], '16.6', $data->country);
				$entry['17'] = $data->timezone->id;
				gform_update_meta($entry['id'], '17', $data->timezone->id);
				$entry['18'] = $data->state_code;
				gform_update_meta($entry['id'], '18', $data->state_code);
				$entry['19'] = $data->country_code;
				gform_update_meta($entry['id'], '19', $data->country_code);
				$entry['24'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '24', 'Yes');
			}
			return $entry;
		case '2':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['4.3'] = $data->city;
				gform_update_meta($entry['id'], '4.3', $data->city);
				$entry['4.4'] = $data->state;
				gform_update_meta($entry['id'], '4.4', $data->state);
				$entry['4.5'] = $data->postal;
				gform_update_meta($entry['id'], '4.5', $data->postal);
				$entry['4.6'] = $data->country;
				gform_update_meta($entry['id'], '4.6', $data->country);
				$entry['5'] = $data->timezone->id;
				gform_update_meta($entry['id'], '5', $data->timezone->id);
				$entry['6'] = $data->state_code;
				gform_update_meta($entry['id'], '6', $data->state_code);
				$entry['7'] = $data->country_code;
				gform_update_meta($entry['id'], '7', $data->country_code);
				$entry['13'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '13', 'Yes');
			}
			return $entry;
		case '4':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['19.3'] = $data->city;
				gform_update_meta($entry['id'], '19.3', $data->city);
				$entry['19.4'] = $data->state;
				gform_update_meta($entry['id'], '19.4', $data->state);
				$entry['19.5'] = $data->postal;
				gform_update_meta($entry['id'], '19.5', $data->postal);
				$entry['19.6'] = $data->country;
				gform_update_meta($entry['id'], '19.6', $data->country);
				$entry['20'] = $data->timezone->id;
				gform_update_meta($entry['id'], '20', $data->timezone->id);
				$entry['21'] = $data->state_code;
				gform_update_meta($entry['id'], '21', $data->state_code);
				$entry['22'] = $data->country_code;
				gform_update_meta($entry['id'], '22', $data->country_code);
				$entry['24'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '24', 'Yes');
			}
			return $entry;
		case '7':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['6.3'] = $data->city;
				gform_update_meta($entry['id'], '6.3', $data->city);
				$entry['6.4'] = $data->state;
				gform_update_meta($entry['id'], '6.4', $data->state);
				$entry['6.5'] = $data->postal;
				gform_update_meta($entry['id'], '6.5', $data->postal);
				$entry['6.6'] = $data->country;
				gform_update_meta($entry['id'], '6.6', $data->country);
				$entry['7'] = $data->timezone->id;
				gform_update_meta($entry['id'], '7', $data->timezone->id);
				$entry['8'] = $data->state_code;
				gform_update_meta($entry['id'], '8', $data->state_code);
				$entry['9'] = $data->country_code;
				gform_update_meta($entry['id'], '9', $data->country_code);
				$entry['15'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '15', 'Yes');
			}
			return $entry;
		case '8':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['6.3'] = $data->city;
				gform_update_meta($entry['id'], '6.3', $data->city);
				$entry['6.4'] = $data->state;
				gform_update_meta($entry['id'], '6.4', $data->state);
				$entry['6.5'] = $data->postal;
				gform_update_meta($entry['id'], '6.5', $data->postal);
				$entry['6.6'] = $data->country;
				gform_update_meta($entry['id'], '6.6', $data->country);
				$entry['7'] = $data->timezone->id;
				gform_update_meta($entry['id'], '7', $data->timezone->id);
				$entry['8'] = $data->state_code;
				gform_update_meta($entry['id'], '8', $data->state_code);
				$entry['9'] = $data->country_code;
				gform_update_meta($entry['id'], '9', $data->country_code);
				$entry['16'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '16', 'Yes');
			}
			return $entry;
		case '9':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['6.3'] = $data->city;
				gform_update_meta($entry['id'], '6.3', $data->city);
				$entry['6.4'] = $data->state;
				gform_update_meta($entry['id'], '6.4', $data->state);
				$entry['6.5'] = $data->postal;
				gform_update_meta($entry['id'], '6.5', $data->postal);
				$entry['6.6'] = $data->country;
				gform_update_meta($entry['id'], '6.6', $data->country);
				$entry['7'] = $data->timezone->id;
				gform_update_meta($entry['id'], '7', $data->timezone->id);
				$entry['8'] = $data->state_code;
				gform_update_meta($entry['id'], '8', $data->state_code);
				$entry['9'] = $data->country_code;
				gform_update_meta($entry['id'], '9', $data->country_code);
        $entry['36'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '36', 'Yes');
			}
			return $entry;
		case '13':
			$ip = GFFormsModel::get_ip();
			$data = getGeoLocationFromIP($ip);

			if(!empty($data)) {
				$entry['4.3'] = $data->city;
				gform_update_meta($entry['id'], '4.3', $data->city);
				$entry['4.4'] = $data->state;
				gform_update_meta($entry['id'], '4.4', $data->state);
				$entry['4.5'] = $data->postal;
				gform_update_meta($entry['id'], '4.5', $data->postal);
				$entry['4.6'] = $data->country;
				gform_update_meta($entry['id'], '4.6', $data->country);
				$entry['5'] = $data->timezone->id;
				gform_update_meta($entry['id'], '5', $data->timezone->id);
				$entry['6'] = $data->state_code;
				gform_update_meta($entry['id'], '6', $data->state_code);
				$entry['7'] = $data->country_code;
				gform_update_meta($entry['id'], '7', $data->country_code);
				$entry['12'] = 'Yes'; //let CRM know we have location
				gform_update_meta($entry['id'], '12', 'Yes');
			}
			return $entry;
		default:
			return $entry;
	}
}

function getGeoLocationFromIP($ipAddress)
{
	$timeZoneApiUrl = "https://timezoneapi.io/api/ip/?ip=";
	$timeZoneApiAccessKey = "[yourkey]";
	$apiUrl = $timeZoneApiUrl . $ipAddress . '&token=' . $timeZoneApiAccessKey . "&output=json";

	$request = wp_remote_get($apiUrl);

	if(is_wp_error($request)) {
		return $entry; // Bail early
	}

	$body = wp_remote_retrieve_body($request);
	$data = json_decode($body);
	return $data->data;
}