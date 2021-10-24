<?php 
class Price{
    public $pizza,$size,$sauce;
    function __construct($pizza,$size,$sauce){
        $this->pizza=$pizza;
        $this->size=$size;
        $this->sauce=$sauce;
    }
    function getPrice(){
        return $this->pizza['price']*$this->size['factor']+$this->sauce['price'];
    }
    function getPricePizza(){
        return $this->pizza['price']*$this->size['factor'];
    }
}