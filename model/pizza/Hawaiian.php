<?php
class Hawaiian extends Pizza{
    function setParam(){
        $mysql = new MySQL();
        return $mysql->select("pizza",3)->fetch_row();
    }
}