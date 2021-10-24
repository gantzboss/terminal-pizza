<?php
class MySQL{
    private $mysql;
    function __construct(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        if($config = parse_ini_file("config/db.ini")){
            $this->mysql = new mysqli($config['local'],$config['user'],$config['pass'],$config['dbname']);
            $this->mysql->query("SET NAMES 'utf8';");
        }
    }

    function select($table, $param=null){
        $sql = isset($param)?
            "SELECT * FROM $table WHERE id=?":
            "SELECT * FROM $table";
        $stmt = $this->mysql->prepare($sql);
        if(isset($param)){
            $stmt->bind_param("i",$param);
        }
        $stmt->execute();
        return $stmt->get_result();
    }

    function __destruct(){
        $this->mysql->close();
    }
}