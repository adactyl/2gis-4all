<?php

class m140813_045939_firm_update extends CDbMigration
{

    /* create/remove columns: confirm, longitude, latitude */

	public function safeUp()
	{
        $this->addColumn('firm', 'confirm', 'boolean');
        $this->addColumn('firm', 'longitude', 'float');
        $this->addColumn('firm', 'latitude', 'float');

        echo 'Migration down successfully completed';
	}

	public function safeDown()
	{
        $this->dropColumn('firm', 'confirm');
        $this->dropColumn('firm', 'longitude');
        $this->dropColumn('firm', 'latitude');

        echo 'Migration down successfully completed';
	}
}