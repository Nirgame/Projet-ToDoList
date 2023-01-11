<?php

interface BDD_int
{
    function __construct();
    function __destruct();
    public function Withoutreturn ($req,$param=null);
    public function Withreturn ($req,$param=null);
}