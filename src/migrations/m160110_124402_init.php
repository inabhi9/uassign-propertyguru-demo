<?php

use yii\db\Migration;

class m160110_124402_init extends Migration {
    public function up() {
        $this->execute(file_get_contents(__DIR__ . '/propertyguru.sql'));
    }

    public function down() {
        echo "m160110_124402_init cannot be reverted.\n";

        return false;
    }
}
