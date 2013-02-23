<?php

class m121101_113606_add_column_role_id_city_id extends CDbMigration
{
	public function up()
	{
            $this->addColumn('tbl_user', 'city_id','INTEGER' );
            $this->addColumn('tbl_user', 'role_id','INTEGER' );
	}

	public function down()
	{
            $this->dropColumn('tbl_user', 'city_id' );
            $this->dropColumn('tbl_user', 'role_id' );
	}	
}