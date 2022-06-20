<?php

class ConstantsClass{
    const Message = "Grace bisimwa";
    public function Bye(){
        echo self::Message;
    }
}

$go = new ConstantsClass();
$go->Bye();