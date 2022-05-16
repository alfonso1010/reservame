<?php

use yii\db\Migration;

/**
 * Class m200503_034056_create_table_clientes
 */
class m200503_034056_create_table_clientes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('clientes', [
            'id' => $this->integer(11)->unsigned()->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'id_usuario' => $this->integer(11)->unsigned()->notNull(),
            'nombre' => $this->string(),
            'apellidos' => $this->string(),
            'celular' => $this->string(),
            'activo' => $this->tinyInteger(1)->defaultValue(0),
            'fecha_alta' => $this->dateTime()->notNull(),
            'fecha_actualizacion' => $this->dateTime()->notNull()
        ]);


        $this->createIndex(
            'idx-cliente-usuario',
            'clientes',
            'id_usuario'
        );

        $this->addForeignKey(
            'fk-cliente-id_usuario',
            'clientes',
            'id_usuario',
            'user', //tbl_foranea
            'id', // pk tbl_foranea
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200503_034056_create_table_clientes cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200503_034056_create_table_clientes cannot be reverted.\n";

        return false;
    }
    */
}
