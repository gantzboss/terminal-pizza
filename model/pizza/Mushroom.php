<?php 
class Mushroom extends Pizza{
    function setParam(){
        $mysql = new MySQL();
        return $mysql->select("pizza",4)->fetch_row();
    }
}