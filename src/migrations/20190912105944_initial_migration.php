<?php

use App\Migration\CreateStudentsTable;
use App\Migration\Migration;

class InitialMigration extends Migration
{
    public function up()  {

        CreateStudentsTable::up($this->schema);
    }

    public function down()  {
        CreateStudentsTable::down($this->schema);
    }
}
