<?php

class m121113_114947_create_table_tbl_profile_salon extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_profile_salon', array(
                'id' => 'pk',
                'salon_name' => 'VARCHAR(200) NOT NULL',
                'phone' => 'VARCHAR(100)',
                'address1' => 'VARCHAR(255)',
                'address2' => 'VARCHAR(255)',
                'contact_person' => 'VARCHAR(255)',
                'contact_email' => 'VARCHAR(255)',
                'salon_type' => 'INTEGER',
                'salon_picture' => 'VARCHAR(200)',
                'business_description' => 'TEXT',
                'services_offered' => 'TEXT',
                'lattitude' => 'decimal',
                'longitude' => 'decimal',
            ), 'ENGINE InnoDB');
	}

	public function down()
	{
		$this->dropTable('tbl_profile_salon');
	}
}