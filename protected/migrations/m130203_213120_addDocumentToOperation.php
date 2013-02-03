<?php

class m130203_213120_addDocumentToOperation extends CDbMigration
{
	public function up()
	{
		$this->addColumn('operation', 'document_id', 'integer NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('operation', 'document_id');
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