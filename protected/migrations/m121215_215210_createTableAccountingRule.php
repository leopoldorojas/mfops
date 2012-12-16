<?php

class m121215_215210_createTableAccountingRule extends CDbMigration
{
	public function up()
	{
		$this->createTable('accounting_rule', array(
			'id' => 'pk',
			'input' => 'boolean NOT NULL',
			'type_id' => 'integer NOT NULL',						
			'debitAccount1'=>'string NOT NULL',
			'creditAccount1'=>'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121215_215210_createTableAccountingRule does not support migration down.\n";
		// return false;
		$this->dropTable('accounting_rule');		
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