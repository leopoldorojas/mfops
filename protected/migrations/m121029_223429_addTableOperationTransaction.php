<?php

class m121029_223429_addTableOperationTransaction extends CDbMigration
{
	public function up()
	{
		$this->createTable('operation', array(
			'id' => 'pk',
			'input' => 'boolean NOT NULL',
			'type_id' => 'integer NOT NULL',						
			'operation_date' => 'date NOT NULL',
			'amount' => 'money',
			'entity_id' => 'integer',
			'entity_name' => 'string',
			'reference_price'=>'money',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121029_223429_addTableOperationTransaction does not support migration down.\n";
		// return false;
		$this->dropTable('operation');		
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}