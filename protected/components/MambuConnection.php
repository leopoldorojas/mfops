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
	private $alreadyConnect = false;

	public function connect()
	{
		if (!$this->alreadyConnect)
		{
			require_once($this->restClientLib);
			$this->uri = "$this->tenantUrl/$this->apiSubdirectory/$this->transaction";
			$testUri = "$this->tenantUrl/$this->apiSubdirectory/branches";		// Test requiring Branches only to confirm there is a connection

			$response = \Httpful\Request::get($testUri)
				->sendsJson()              
				->authenticateWith($this->user, $this->password)
				->send();

			$this->alreadyConnect = ($response->code == 200);
			return $this->alreadyConnect;
		} else
			return true;
	}

	public function post()
	{
		$response = \Httpful\Request::post($this->uri)
			->sendsJson()              
			->authenticateWith($this->user, $this->password)
			->body($this->postBody)
			->send();

		return ($response->code == 201);
	}

}