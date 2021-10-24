<?php
class Village extends Pizza{
    function setParam(){
        $mysql = new MySQL();
        return $mysql->select("pizza",2)->fetch_row();
    }
}