<?php

class m130203_211056_addDocumentModel extends CDbMigration
{
	public function up()
	{
		$this->createTable('document', array(
			'id' => 'pk',
			'documentType_id' => 'integer NOT NULL',
			'number' => 'string NOT NULL',	
			'document_date' => 'date NOT NULL',
			'entity_id' => 'integer',
			'entity_name' => 'string',
			'description' => 'text',
			'user_id' => 'integer NOT NULL',
			'createdon' => 'timestamp NOT NULL',
			'updatedon' => 'timestamp NOT NULL',
		));
	}

	public function down()
	{
		$this->dropTable('document');		
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