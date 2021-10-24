<?php
class Pepperoni extends Pizza{
    function setParam(){
        $mysql = new MySQL();
        return $mysql->select("pizza",1)->fetch_row();
    }
}