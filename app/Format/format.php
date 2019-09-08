<?php
namespace App\Format;


class format{
    
    function gethtml(){
        return $this;
    }

    function __toString(){
        return json_encode($this);
    }
    function __sleep(){
        return ['code','data'];
    }
}