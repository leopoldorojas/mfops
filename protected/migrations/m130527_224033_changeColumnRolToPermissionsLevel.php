<?php

class m130527_224033_changeColumnRolToPermissionsLevel extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'permission_level', 'integer');
		$this->dropColumn('user', 'rol');		
	}

	public function down()
	{
		$this->dropColumn('user', 'permission_level');
		$this->addColumn('user', 'rol', 'string NOT NULL');
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