<?php

    class Car{

        public $name;
        public $color;

        function __construct($name, $color) {

            $this->name = $name;
            $this->color = $color;
        
        }

        function __destruct(){

            echo "The car is {$this->name} and the color {$this->color}";

        }

    }
    
    $i = 0;

    while($i <= 10){
        echo $i ."<br/>";
        $i++;
    }

    $rouge = new Car('Cruiser', "Black");