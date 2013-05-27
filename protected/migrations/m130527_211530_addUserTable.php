<?php

class m130527_211530_addUserTable extends CDbMigration
{
	public function up()
	{
		$this->createTable('user', array(
			'id' => 'pk',
			'username' => 'string NOT NULL',
			'encrypted_password' => 'string NOT NULL',						
			'email' => 'string',
			'name' => 'string',
			'company_id' => 'integer NOT NULL',
			'rol' => 'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121029_223429_addTableOperationTransaction does not support migration down.\n";
		// return false;
		$this->dropTable('user');		
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