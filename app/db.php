<?php

class DB
{
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new PDO("sqlite:./data/base.db", null, null, array(PDO::ATTR_PERSISTENT => true,));
        }
        return self::$instance;
    }

    private function __construct()
    {
    }

    public static function sql($sql, $args = [])
    {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    public static function getRow($sql, $args = [])
    {
        return self::sql($sql, $args)->fetch();
    }

    private static $instance;
}
