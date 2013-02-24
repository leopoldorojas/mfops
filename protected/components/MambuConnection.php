<?php

/**
 * This component is used to connect to Mambu via its API.
 */

class MambuConnection extends CApplicationComponent
{
	public $postBody="";
	public $transaction="gljournalentries";
	public $tenantUrl, $restClientLib, $apiSubdirectory, $user, $password;

	public function postingToMambu()
	{
		require_once($this->restClientLib);
		$uri = "$this->tenantUrl/$this->apiSubdirectory/$this->transaction";
		$response = \Httpful\Request::post($uri)
			->sendsJson()              
			->authenticateWith($this->user, $this->password)
			->body($this->postBody)
			->withoutAutoParsing()
			->send();

		$responseDecoded = json_decode($response);
		return array(
			'returnCode' => $responseDecoded->returnCode,
			'returnStatus' => $responseDecoded->returnStatus,
		);
	}

}