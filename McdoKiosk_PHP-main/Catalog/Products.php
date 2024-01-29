<?php


class Product
{

    public $productArray = array(
        "cb" => array(
            'id' => '1',
            'name' => 'Cheeseburger',
            'code' => 'cb',
            'image' => '../img/Cheeseburger.jpg',
            'price' => '55.00', 
            'category' => 'Burgers'
        ),
        "bm" => array(
            'id' => '2',
            'name' => 'Big Mac',
            'code' => 'bm',
            'image' => '../img/Big Mac Solo.jpg',
            'price' => '171.00', 
            'category' => 'Burgers'
        ),
        "qtr" => array(
            'id' => '3',
            'name' => 'Quarter Pounder',
            'code' => 'qtr',
            'image' => '../img/Quarter Pounder.jpg',
            'price' => '180.00', 
            'category' => 'Burgers'
        ),
        "cs1" => array(
            'id' => '4',
            'name' => '1-pc chicken solo',
            'code' => 'cb',
            'image' => '../img/1-pc Chicken Mcdo.jpg',
            'price' => '90.00', 
            'category' => 'Chicken'
        ),
        "cs2" => array(
            'id' => '5',
            'name' => '2-pc chicken solo',
            'code' => 'bm',
            'image' => '../img/2-pc Chicken Mcdo.jpg',
            'price' => '180.00', 
            'category' => 'Chicken'
        ),
        "cs8" => array(
            'id' => '6',
            'name' => '8-pc chicken solo',
            'code' => 'qtr',
            'image' => '../img/8-pc Chicken Mcdo.jpg',
            'price' => '760.00', 
            'category' => 'Chicken'
        ),
        "ck" => array(
            'id' => '7',
            'name' => 'Coke',
            'code' => 'ck',
            'image' => '../img/Coke.jpg',
            'price' => '66.00', 
            'category' => 'Drinks'
        ),
        "ic" => array(
            'id' => '8',
            'name' => 'Iced Tea',
            'code' => 'ic',
            'image' => '../img/Iced Tea.jpg',
            'price' => '72.00', 
            'category' => 'Drinks'
        ),
        "sp" => array(
            'id' => '9',
            'name' => 'Sprite',
            'code' => 'sp',
            'image' => '../img/Sprite.jpg',
            'price' => '67.00', 
            'category' => 'Drinks'
        ),
        "ap" => array(
            'id' => '10',
            'name' => 'Apple Pie',
            'code' => 'ck',
            'image' => '../img/Apple Pie.jpg',
            'price' => '41.00', 
            'category' => 'Extras'
        ),
        "fr" => array(
            'id' => '11',
            'name' => 'Fries',
            'code' => 'fr',
            'image' => '../img/Fries.jpg',
            'price' => '74.00', 
            'category' => 'Extras'
        ),

        "bff" => array(
            'id' => '12',
            'name' => 'BFF Fries',
            'code' => 'bff',
            'image' => '../img/BFF Fries.jpg',
            'price' => '154.00', 
            'category' => 'Extras'
        ),

        "rc" => array(
            'id' => '13',
            'name' => 'Rice',
            'code' => 'rc',
            'image' => '../img/Rice.jpg',
            'price' => '33.00', 
            'category' => 'Extras'
        )
    
    );

    public function getAllProduct()
    {
        return $this->productArray;
    }
}

?>