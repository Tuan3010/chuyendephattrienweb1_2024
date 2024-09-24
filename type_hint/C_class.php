<?php
require_once 'Interf.php';

class C implements I{
    public function f(){
        echo ('this is Function f() from class C implements I');
    }
}