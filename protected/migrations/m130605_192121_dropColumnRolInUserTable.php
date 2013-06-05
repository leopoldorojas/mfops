<?php

class m130605_192121_dropColumnRolInUserTable extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('user', 'rol');		
	}

	public function down()
	{
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