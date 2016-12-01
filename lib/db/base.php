<?php

class Db_Base
{
    private static $db;
    public static function getDb()

    {
if (empty(self::$db)){
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;port=3306;',
            'localhost',
            'postItMap'
        );
        self::$db= new PDO($dsn, 'user', 'Nacc2016');
}
        return self::$db;
    }
}

?>