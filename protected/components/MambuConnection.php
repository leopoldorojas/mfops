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

	public function connect($tenant=null)
	{
		if (!$this->alreadyConnect)
		{
			require_once($this->restClientLib);

			if ($tenant)
			{
				$this->tenantUrl = $tenant->tenant_url;
				$this->user = $tenant->tenant_user;
				$this->password = $tenant->tenant_password;
			}

			$this->uri = "$this->tenantUrl/$this->apiSubdirectory/$this->transaction";
			$testUri = "$this->tenantUrl/$this->apiSubdirectory/branches";		// Test requiring Branches only to confirm there is a connection

            /* $response = array(
            	'status' => 'error',
            	'model' => 0,
            	'message' => "El tenant es $this->tenantUrl, el user es $this->user, el password es $this->password",
            );
            echo json_encode($response);
            Yii::app()->end(); */

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

		$return = array('return'=>false, 'entryID1'=>0, 'entryID2'=>0, 'transactionID' => "", 'errorCode' => 0);
		
		if ($return['return'] = ($response->code == 201))
		{
			$return['entryID1'] = $response->body[0]->entryID;
			$return['entryID2'] = $response->body[1]->entryID;
			$return['transactionID'] = $response->body[0]->transactionID;
		} else {
			$return['errorCode'] = $response->code;
		}

		return $return;
	}

}