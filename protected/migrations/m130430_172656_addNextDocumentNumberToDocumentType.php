<?php

class m130430_172656_addNextDocumentNumberToDocumentType extends CDbMigration
{
	public function up()
	{
		$this->addColumn('document_type', 'next_number', 'integer');
	}

	public function down()
	{
		$this->dropColumn('document_type', 'next_number');
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