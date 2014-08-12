<?php

class m140811_091559_init_db extends CDbMigration
{
	public function up()
	{
        $this->createTable('user', array(
            'id' => 'pk',
            'username' => 'text',
            'password' => 'text',
            'email' => 'text',
            'red_date' => 'date',
            'visit_date' => 'date'
        ));
        $this->createTable('ticket', array(
            'id' => 'pk',
            'name' => 'text',
            'address' => 'text',
            'timetable' => 'json',
            'contacts' => 'json'
        ));
        echo 'Migration up complete';
        return true;
	}

	public function down()
	{
		$this->dropTable('user');
        $this->dropTable('ticket');
        echo 'Migration down complete';
		return true;
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