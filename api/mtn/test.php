<?php
	$curl_post_data = '
	<?xml version="1.0" encoding="UTF-8"?>
<ns0:debitrequest xmlns:ns0="http://www.ericsson.com/em/emm/financial/v1_0">
<fromfri>FRI:250784848236/MSISDN</fromfri>
<tofri>FRI:uplus.sp/USER</tofri>
<amount>
<amount>100</amount>
<currency>RWF</currency>
</amount>
<externaltransactionid>345678IUN</externaltransactionid>
<frommessage/>
<tomessage/>
<referenceid>345678IUN</referenceid>
</ns0:debitrequest>
';
	$service_url = 'https://10.33.1.14:8052/mot/mm/debit';
	$curl = curl_init($service_url);
	curl_setopt ($curl, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml"));
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, "uplus.sp:Mtnecw@6530"); //Your credentials here
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt ($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
	curl_setopt($curl, CURLOPT_CAINFO, '/var/www/html/api/mtn/certs/m3-ca-1.pem');
	curl_setopt($curl, CURLOPT_CERTINFO, TRUE);
	curl_setopt($curl, CURLOPT_SSLCERT, '/var/www/html/api/mtn/certs/uplusCertificate.pem');
	curl_setopt($curl, CURLOPT_SSLKEY, '/var/www/html/api/mtn/certs/cakey.pem');
	curl_setopt($curl, CURLOPT_KEYPASSWD, "uplus123");
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
	curl_setopt($curl, CURLOPT_VERBOSE, true);

	var_dump(file_get_contents('/var/www/html/api/mtn/certs/cakey.pem'));

	$curl_res = curl_exec($curl);
	var_dump(curl_error($curl));
	// $response = json_decode($curl_res);
	curl_close($curl);
	var_dump($curl_res);
	// var_dump($response);

	// Great thing
	// curl --verbose https://ecwtest.mtn.co.rw:8052/mot/mm/debit --cert /var/www/html/api/mtn/certs/uplusCertificate.pem --key  /var/www/html/api/mtn/certs/cakey.pem:uplus123 --cacert /var/www/html/api/mtn/certs/m3-ca-1.pem --tlsv1.2 --user uplus.sp:Mtnecw@6530 -d '
	<?xml version="1.0" encoding="UTF-8"?>
<ns0:debitrequest xmlns:ns0="http://www.ericsson.com/em/emm/financial/v1_0">
<fromfri>FRI:250784848236/MSISDN</fromfri>
<tofri>FRI:uplus.sp/USER</tofri>
<amount>
<amount>300</amount>
<currency>RWF</currency>
</amount>
<externaltransactionid>11UN2</externaltransactionid>
<frommessage/>
<tomessage/>
</ns0:debitrequest>' -H 'Content-Type: text/xml'

curl --verbose https://ecwtest.mtn.co.rw:8052/mot/mm/debit --cert /var/www/html/api/mtn/certs/uplusCertificate.pem --key  /var/www/html/api/mtn/certs/cakey.pem --cacert /var/www/html/api/mtn/certs/m3-ca-1.pem --tlsv1.2 --user uplus.sp:Mtnecw@6530 -d '
<?xml version="1.0" encoding="UTF-8"?>
<ns0:debitrequest xmlns:ns0="http://www.ericsson.com/em/emm/financial/v1_0">
<fromfri>FRI:250784848236/MSISDN</fromfri>
<tofri>FRI:uplus.sp/USER</tofri>
<amount>
<amount>300</amount>
<currency>RWF</currency>
</amount>
<externaltransactionid>u1</externaltransactionid>
<frommessage/>
<tomessage/>
<referenceid>u1</referenceid>
</ns0:debitrequest>' -H 'Content-Type: text/xml'


?>