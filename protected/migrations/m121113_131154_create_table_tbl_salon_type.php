<?php

class m121113_131154_create_table_tbl_salon_type extends CDbMigration
{
	public function up()
	{
            $this->createTable('tbl_salon_type', array(
                'id' => 'pk',
                'name' => 'VARCHAR(150)',
            ));
	}

	public function down()
	{
            $this->dropTable('tbl_salon_type');
	}

}