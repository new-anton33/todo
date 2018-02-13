<?php
class DB {

    protected static $_instance;

    public static function getInstance() {
    if (self::$_instance === null) {
    self::$_instance = new self;
    }
    return self::$_instance;
    }

    private  function __construct() {
        $this->connect = mysql_connect(HOST, USER, PASSWORD) or die("Error connection".mysql_error());
        mysql_select_db(NAME_BD, $this->connect) or die ("Not connected to db ".mysql_error());
        $this->query('SET names "utf8"');
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

    public static function query($sql) {

    $obj=self::$_instance;

    if(isset($obj->connect)){
    $obj->count_sql++;
    $result = mysql_query($sql)or die("Error Mysql:".mysql_error());
    return $result;
    }
    return false;
    }

    public static function fetch_object($object)
    {
    return @mysql_fetch_object($object);
    }

    public static function fetch_assoc($object)
    {
    return @mysql_fetch_assoc($object);
    }

    public static function insert_id()
    {
    return @mysql_insert_id();
    }


}

?>