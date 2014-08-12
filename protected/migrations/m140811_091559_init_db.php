<?php

class m140811_091559_init_db extends CDbMigration
{
    /*
	public function up()
	{
	}

	public function down()
	{
	}
    */

	// Миграция в транзакции: если произойдет ошибка, то всё не свалится.
	public function safeUp()
	{
	    $this->createTable('user', array(
            'id' => 'pk',
            'username' => 'text',
            'password' => 'text',
            'email' => 'text',
            'red_date' => 'date',
            'visit_date' => 'date'
        ));
        $this->createTable('firm', array(
            'id' => 'pk',
            'name' => 'text',
            'address' => 'text',
            'timetable' => 'json',
            'contacts' => 'json',
            'owner' => 'int references "user"("id")'
        ));

        echo 'Migration up complete';
        return true;
	}

	public function safeDown()
	{
        $this->dropTable('user');
        $this->dropTable('firm');
        echo 'Migration down complete';
        return true;
	}
}