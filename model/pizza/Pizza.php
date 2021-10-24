<?php
abstract class Pizza{
    protected $id,$name,$price;
    function __construct(){
        $result = $this->setParam();
        $this->id = $result[0];
        $this->name = $result[1];
        $this->price = $result[2];
    }
    abstract function setParam();
    public function getPizza(){
        return ['id'=>$this->id,'name'=>$this->name,'price'=>$this->price];
    }
}