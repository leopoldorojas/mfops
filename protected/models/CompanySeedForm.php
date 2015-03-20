<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CompanySeedForm extends CFormModel
{
	public $source_company;
	public $target_company;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('source_company, target_company', 'required'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'source_company'=>'Empresa Origen',
			'target_company'=>'Empresa Destino',
		);
	}

	/**
	 * Do the copy of seed data from a company to another.
	 * @return boolean whether loading of data is successful
	 */
	public function loadData()
	{
		// Copy from $this->source to $this->target
    // return successful_copy or false if not
    $accountingRules = AccountingRule::model()->findAllByAttributes(array('company_id'=>4), array(),'');

    foreach ($accountingRules as $accountingRule)
    {
        $movementType = MovementType::model()->findByAttributes(array('id'=>$accountingRule->type_id));
        $movementType2 = MovementType::model()->findByAttributes(array('description'=>$movementType->description, 'company_id'=>8));

        $accountingRule2 = AccountingRule::model()->findByAttributes(array('description'=>$accountingRule->description, 'company_id'=>8));
        $accountingRule2->type_id = $movementType2->id;
        $accountingRule2->save();
    }
	}

}