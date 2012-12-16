<?php

class m121215_221636_createTableMovementCategory extends CDbMigration
{
	public function up()
	{
		$this->createTable('movement_category', array(
			'id' => 'pk',
			'description' => 'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		// echo "m121215_221619_createTableMovementType does not support migration down.\n";
		// return false;
		$this->dropTable('movement_category');
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