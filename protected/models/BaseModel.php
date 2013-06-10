<?php

/**
 * This is the model base to control default scope and saving to Multitenancy functionality.
 */
class BaseModel extends CActiveRecord
{

	public function defaultScope()
    { 
        return array(
            'condition'=>$this->getTableAlias(false, false) . ".company_id='".Yii::app()->user->company_id."'",
        );
    }   

	public function rules() 
	{
        return array(                   
        	array('company_id', 'safe'),
        );
	}

	protected function beforeSave()
	{
	    if(parent::beforeSave())
	    {
		    $this->company_id = Yii::App()->user->company_id;
		    return true;
	    }
	    else
	        return false;
	}

}