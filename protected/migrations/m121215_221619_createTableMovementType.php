<?php

class m121215_221619_createTableMovementType extends CDbMigration
{
	public function up()
	{
		$this->createTable('movement_type', array(
			'id' => 'pk',
			'movement_category_id' => 'integer NOT NULL',
			'description'=>'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121215_221619_createTableMovementType does not support migration down.\n";
		// return false;
		$this->dropTable('movement_type');
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