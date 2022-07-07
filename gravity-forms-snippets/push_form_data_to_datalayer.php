<?php
//add as a code snippet or to your functions.php file
add_action('gform_after_submission', 'send_to_gtm', 10, 2);
function send_to_gtm($entry, $form)
{
    //FORM IDS:
    // 1 = Contact Page
    // array of form IDs we care about tracking
    $form_ids = array(1);
    //if the form ID isn't one of the ones we have specified
    //return without doing anything
    if (!in_array($form['id'], $form_ids)) {
        return;
    }

    ?>
	<script>
		(function(t,e){"use strict";function n(){if(!a){a=!0;for(var t=0;t<d.length;t++)d[t].fn.call(window,d[t].ctx);d=[]}}function o(){"complete"===document.readyState&&n()}t=t||"docReady",e=e||window;var d=[],a=!1,c=!1;e[t]=function(t,e){if("function"!=typeof t)throw new TypeError("callback for docReady(fn) must be a function");a?setTimeout(function(){t(e)},1):(d.push({fn:t,ctx:e}),"complete"===document.readyState||!document.attachEvent&&"interactive"===document.readyState?setTimeout(n,1):c||(document.addEventListener?(document.addEventListener("DOMContentLoaded",n,!1),window.addEventListener("load",n,!1)):(document.attachEvent("onreadystatechange",o),window.attachEvent("onload",n)),c=!0))}})("docReady",window);
	</script>
	<?php

    $eventTime = time();

    switch ($form['id']) {
        //Contact Page
        case '1': ?>
		<script type="text/javascript">
			docReady(function() {
				var data = {
					'formId': 1,
					'formName': 'Contact Form',
					'firstName': '<?php echo esc_js(rgar($entry, '1.3', '')); ?>',
					'hashedFirstName': '',
					'lastName':'<?php echo esc_js(rgar($entry, '1.6', '')); ?>',
					'hashedLastName': '',
					'email': '<?php echo esc_js(rgar($entry, '2', '')); ?>',
					'hashedEmail': '',
					'phone': '<?php echo esc_js(rgar($entry, '4', '')); ?>',
					'hashedPhone': '',
					'businessName': '<?php echo esc_js(rgar($entry, '20', '')); ?>',
					'website': '<?php echo esc_js(rgar($entry, '21', '')); ?>',
					'city': '<?php echo esc_js(rgar($entry, '16.3', '')); ?>',
					'hashedCity': '',
					'hashedNoSpacesCity': '',
					'state': '<?php echo esc_js(rgar($entry, '16.4', '')); ?>',
					'stateCode': '<?php echo esc_js(rgar($entry, '18', '')); ?>',
					'hashedState': '',
					'hashedStateCode': '',
					'postalCode': '<?php echo esc_js(rgar($entry, '16.5', '')); ?>',
					'hashedPostalCode': '',
					'country': '<?php echo esc_js(rgar($entry, '16.6', '')); ?>',
					'countryCode': '<?php echo esc_js(rgar($entry, '19', '')); ?>',
                    'timeZone': '<?php echo esc_js(rgar($entry, '17', '')); ?>',
					'hashedCountry': '',
					'hashedCountryCode': '',
					'conversionType': 'Lead',
					'eventTime': <?php echo $eventTime ?>
				};

				if(data.firstName)
				{
					data.hashedFirstName = '<?php echo hash('sha256', esc_js(rgar($entry, '1.3', ''))); ?>';
				}

				if(data.lastName)
				{
					data.hashedLastName = '<?php echo hash('sha256', esc_js(rgar($entry, '1.6', ''))); ?>';
				}

				if(data.email)
				{
					<?php
$lowerCaseEmail = mb_convert_case(esc_js(rgar($entry, '2', '')), MB_CASE_LOWER, 'UTF-8');
            ?>
					data.hashedEmail = '<?php echo hash('sha256', $lowerCaseEmail); ?>';
				}

				if(data.phone)
				{
					<?php
$cleanPhone = preg_replace('/[^0-9]/', '', esc_js(rgar($entry, '4', '')));
            ?>
					data.hashedPhone = '<?php echo hash('sha256', $cleanPhone); ?>';
				}

				if(data.city)
				{
					<?php
$city = esc_js(rgar($entry, '16.3', ''));
            $cleanCity = mb_convert_case($city, MB_CASE_LOWER, 'UTF-8');
            $noSpacesCity = mb_convert_case(preg_replace("/\s+/", "", $city), MB_CASE_LOWER, 'UTF-8');
            ?>
					data.hashedCity = '<?php echo hash('sha256', $cleanCity); ?>';
					data.hashedNoSpacesCity = '<?php echo hash('sha256', $noSpacesCity); ?>';
				}

				if(data.state && data.stateCode)
				{
					<?php
$cleanState = mb_convert_case(esc_js(rgar($entry, '16.4', '')), MB_CASE_LOWER, 'UTF-8');
            $cleanStateCode = mb_convert_case(esc_js(rgar($entry, '18', '')), MB_CASE_LOWER, 'UTF-8');
            ?>
					data.hashedState = '<?php echo hash('sha256', $cleanState); ?>';
					data.hashedStateCode = '<?php echo hash('sha256', $cleanStateCode); ?>';
				}

				if(data.postalCode)
				{
					<?php
$cleanPostalCode = esc_js(rgar($entry, '16.5', ''));
            ?>
					data.hashedPostalCode = '<?php echo hash('sha256', $cleanPostalCode); ?>';
				}

				if(data.country && data.countryCode)
				{

					<?php
$cleanCountry = mb_convert_case(esc_js(rgar($entry, '16.6', '')), MB_CASE_LOWER, 'UTF-8');
            $cleanCountryCode = mb_convert_case(esc_js(rgar($entry, '19', '')), MB_CASE_LOWER, 'UTF-8');
            ?>
					data.hashedCountry = '<?php echo hash('sha256', $cleanCountry); ?>';
					data.hashedCountryCode = '<?php echo hash('sha256', $cleanCountryCode); ?>';
				}

				window.parent.dataLayer.push({
					'event' : 'ajtdContactEvent',
					'ajtdEventDetails': {
						'eventName' : 'Generated Lead',
						'eventCategory' : 'Lead Generation',
						'eventAction': 'User Contacted',
						'eventLabel': 'AJ Tatum Digital',
						'eventValue': 0,
						'eventData': data
					}
				});

				var isSubscriber = '<?php echo esc_js(rgar($entry, '15.1', 'false')); ?>'
				if(isSubscriber != 'false')
				{
					data.conversionType = 'Newsletter Subscriber';

					window.dataLayer.push({
						'event' : 'ajtdNewsletterSubscribeEvent',
						'ajtdEventDetails': {
							'eventName' : 'User Subscribed',
							'eventCategory' : 'Newsletter',
							'eventAction': 'User Subscribed',
							'eventLabel': 'ActiveCampaign',
							'eventValue': 0,
							'eventData': data
						}
					});
				}
			});
		</script>
<?php
break;
        default:
            break;
    }
}