<?php

/**
 * This is the model base to control default scope and saving to Multitenancy functionality.
 */
class BaseModel extends CActiveRecord
{

	/* public function defaultScope()
    { 
        return array(
            'condition'=>"company_id='".Yii::App()->user->company_id."'",
        );
    }   

	public function beforeSave()
	/* Does not allow user to submit clientID with creation form - limits them to editing and creating data
	* for own site only. Overriding whatever they submit with their company_id (site) as populated on login. 
	*/
	/*
	{
	    if(parent::beforeSave())
	    {
		    $this->company_id = Yii::App()->user->company_id;
		    return true;
	    }
	    else
	        return false;
	}

	public function rules() 
	{
        return array(                   
        	array('company_id', 'safe'),
        );
	} */

}