<?php

class m130203_211153_addDocumentTypeModel extends CDbMigration
{
	public function up()
	{
		$this->createTable('document_type', array(
			'id' => 'pk',
			'description' => 'string NOT NULL',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('document_type');
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