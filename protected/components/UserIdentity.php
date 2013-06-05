<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */

class UserIdentity extends CUserIdentity
{
    private $_id;
    public $company_id;
    
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->username, 'company_id'=>$this->company_id));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if ($record->encrypted_password!==crypt($this->password,$this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('name', $record->name);
            $this->setState('company_id', $record->company_id);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
 
    public function getId()
    {
        return $this->_id;
    }
}