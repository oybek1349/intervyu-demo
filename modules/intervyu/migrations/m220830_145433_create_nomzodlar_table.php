<?php

namespace app\modules\intervyu\migrations;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%nomzodlar}}`.
 */
class m220830_145433_create_nomzodlar_table extends Migration
{
    public $table = '{{%nomzodlar}}';
    public $tableOptions = null;
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if ( $this->db->driverName === 'mysql' ) {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        elseif( $this->db->driverName === 'pgsql'){
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci';
        }

        $this->createTable( $this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'familyName' => $this->string(50)->notNull(),
            'address' => $this->string(50)->notNull(),
            'countryOfOrigin' => $this->string(50)->defaultValue(null),
            'emailAddress' => $this->string(50)->notNull(),
            'phoneNumber' => $this->string(13)->notNull(),
            'age' => $this->smallInteger(2)->notNull(),
            'hired' => $this->boolean()->defaultValue(false),
            'status' => $this->smallInteger(2)->defaultValue(1),
            'note' => $this->string(200)->defaultValue(null),
            'dateTimeInterview' => $this->dateTime()->defaultValue(null),
            'created_at' => $this->bigInteger(15)->defaultValue(null),
            'updated_at' => $this->bigInteger(15)->defaultValue(null),
        ], $this->tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
