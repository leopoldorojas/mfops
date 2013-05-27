<?php

class m130527_212511_addCompanyTable extends CDbMigration
{
	public function up()
	{
		$this->createTable('company', array(
			'id' => 'pk',
			'name' => 'string NOT NULL',
			'id_number' => 'string',						
			'address_line_1' => 'string',
			'address_line_2' => 'string',
			'city' => 'string',
			'country' => 'string',
			'telephone' => 'string',						
			'email' => 'string',
			'website' => 'string',
			'tenant_url' => 'string NOT NULL',
			'tenant_user' => 'string NOT NULL',
			'tenant_password' => 'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121029_223429_addTableOperationTransaction does not support migration down.\n";
		// return false;
		$this->dropTable('company');		
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