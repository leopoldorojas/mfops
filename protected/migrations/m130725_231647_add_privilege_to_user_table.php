<?php

class m130725_231647_add_privilege_to_user_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('user', 'privilege', 'integer');
	}

	public function down()
	{
		$this->dropColumn('user', 'privilege');
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