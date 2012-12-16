<?php
// Example file to connect to MAMBU API
// Point to phar
include('httpful-0.2.0.phar');
$uri = 'https://danta.sandbox.mambu.com//api/gljournalentries?from=2009-01-01&to=2012-12-31';

$response = \Httpful\Request::get($uri)
	// ->sendsJson()              
	->authenticateWith('api', 'api1234')
	/* ->body('{	"date":"2012-12-15",
				"debitAccount1":"11000100102",
				"debitAmount1":"2000",
				"creditAccount1":"11000100101",
				"creditAmount1":"2000"}') */
	->send();

echo "La respuesta fue " . var_dump($response);
Yii::app()->end();
?>