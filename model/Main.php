<?php
class Main{
    static $pizzatype=['Pepperoni','Village','Hawaiian','Mushroom'];
    static function renderTemplate($template, $param = false){
        ob_start();
        if($param){
            extract($param);
        }
        include('templates/'.$template);
        return ob_get_clean();
    }
    static function print_option($items){
        $res = "";
        foreach($items as $item){
            $namesize = isset($item['name'])?$item['name']:$item['size'];
            $res.= '<option value="'.$item['id']."\">$namesize</option>";
        }
        return $res;
    }
    static function renderAll($title,$header_content,$page_content){
        $layout = self::renderTemplate('layout.php',['content'=>$page_content,'title'=>$title,'header'=>$header_content]);
        print($layout);
    }
    static function actionorder(){
        if(isset($_POST['pizza'])&&isset($_POST['size'])&&isset($_POST['sauce'])){
            $pizza = +$_POST['pizza'];
            $size = +$_POST['size'];
            $sauce = +$_POST['sauce'];
            if(is_int($pizza)&&is_int($size)&&is_int($sauce)){
                $mysql = new MySQL();
                $pizzatype = new self::$pizzatype[$pizza-1]();
                $selectpizza = $pizzatype->getPizza();
                $selectsizes = $mysql->select("size_pizza",$size)->fetch_assoc();
                $selectsauces = $mysql->select("sauces",$sauce)->fetch_assoc();
                $price = new Price($selectpizza,$selectsizes,$selectsauces);
                $arrayjson = [
                    'pizza'=> $selectpizza['name'],
                    'size'=> $selectsizes['size'],
                    'pricePizza'=> $price->getPricePizza(),
                    'sauce'=> $selectsauces['name'],
                    'priceSauce'=> +$selectsauces['price'],
                    'price'=> $price->getprice()
                ];
                header('Content-Type: application/json');
                echo json_encode($arrayjson);
            }
        }
    }
    static function actionmain(){
        foreach (self::$pizzatype as $value) {
            $pizza = new $value();
            $selectpizza[] = $pizza->getPizza();
        }
        $mysql = new MySQL();
        $selectsizes = $mysql->select("size_pizza");
        $selectsauces = $mysql->select("sauces");
        $title = 'Главная';
        $header = Main::renderTemplate('header.php');
        $content = Main::renderTemplate('form.php',['names'=>$selectpizza,'sizes'=>$selectsizes,'sauces'=>$selectsauces]);
        $main = Main::renderTemplate('main.php',['content'=> $content]);
        self::renderAll($title,$header,$main);
    }
}