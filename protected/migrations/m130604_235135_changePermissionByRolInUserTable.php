<?php

class m130604_235135_changePermissionByRolInUserTable extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'rol', 'string NOT NULL');
		$this->dropColumn('user', 'permission_level');		
	}

	public function down()
	{
		$this->dropColumn('user', 'rol');
		$this->addColumn('user', 'permission_level', 'integer');
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