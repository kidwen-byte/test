<?php

namespace app\models;

use app\engine\Db;
use app\interfaces\IModel;

abstract class Model implements IModel
{

    public function getAll()
    {
        $sql = "SELECT * FROM products";
        return Db::getInstance()->queryAll($sql);
    }

    public function getProduct($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        return Db::getInstance()->queryAllObject($sql, ['id' => $id], get_called_class());
    }

    public function getChar($id)
    {
        $sql = "SELECT pa.value, a.char
        FROM products_attribute pa
        JOIN attribute a
        ON pa.attribute_id = a.id
        WHERE pa.products_id = '{$id}'";
        return Db::getInstance()->queryAll($sql);
    }

    public function filter($value)
    {
        $sql = "SELECT pa.value, a.char, pa.products_id
        FROM products_attribute pa
        JOIN attribute a
        ON pa.attribute_id = a.id
        WHERE pa.value='{$value}'";
        return Db::getInstance()->queryAll($sql);
    }
}
