<?php

/**
 * This component is used to connect to Mambu via its API.
 */

class MambuConnection extends CApplicationComponent
{
	public $postBody="";
	public $transaction="gljournalentries";
	public $tenantUrl, $restClientLib, $apiSubdirectory, $user, $password;
	private $uri;
	private $alreadyInit = false;

	public function init()
	{
		if (!$this->alreadyInit)
		{
			require_once($this->restClientLib);
			$this->uri = "$this->tenantUrl/$this->apiSubdirectory/$this->transaction";
			$testUri = "$this->tenantUrl/$this->apiSubdirectory/glaccounts";
			$testBody = "{'type' : 'EQUITY'}";

			$response = \Httpful\Request::get($testUri)
				->sendsJson()              
				->authenticateWith($this->user, $this->password)
				->body($testBody)
				->send();

			$this->alreadyInit = ($response->body->returnCode == 0);
			return $this->alreadyInit;
		} else
			return true;
	}

	public function post()
	{
		$response = \Httpful\Request::post($this->uri)
			->sendsJson()              
			->authenticateWith($this->user, $this->password)
			->body($this->postBody)
			->withoutAutoParsing()
			->send();

		$responseDecoded = json_decode($response);
		return array(
			'success' => ($responseDecoded->returnCode == 0),
			'returnCode' => $responseDecoded->returnCode,
			'returnStatus' => $responseDecoded->returnStatus,
		);
	}

}