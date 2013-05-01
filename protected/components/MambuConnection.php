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

		$return = array('return'=>false, 'entryID1'=>0, 'entryID2'=>0, 'transactionID' => "");
		
		if ($return['return'] = ($response->code == 201))
		{
			$return['entryID1'] = $response->body[0]->entryID;
			$return['entryID2'] = $response->body[1]->entryID;
			$return['transactionID'] = $response->body[0]->transactionID;
		}

		return $return;
	}

}