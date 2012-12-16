<?php

class m121215_221903_createTableOperationEntity extends CDbMigration
{
	public function up()
	{
		$this->createTable('operation_entity', array(
			'id' => 'pk',
			'name'=>'string NOT NULL',
			'code' => 'string',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121215_221619_createTableMovementType does not support migration down.\n";
		// return false;
		$this->dropTable('operation_entity');
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