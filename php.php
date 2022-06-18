<?php

    class Car{

        // Properties
        public $name;

        function set_name($name){
            $this->name = $name;
        }

        function get_name(){
            return $this->name;
        }

    }

    $toyota = new Car();

    $toyota->set_name('Land');

    echo $toyota->get_name();
?>