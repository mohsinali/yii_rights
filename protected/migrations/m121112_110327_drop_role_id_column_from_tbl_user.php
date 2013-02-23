<?php

class m121112_110327_drop_role_id_column_from_tbl_user extends CDbMigration
{
	public function up()
	{
            $this->dropColumn('tbl_user', 'role_id');
	}

	public function down()
	{
            $this->addColumn('tbl_user', 'role_id','INTEGER' );
	}

}