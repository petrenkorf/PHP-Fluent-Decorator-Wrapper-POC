<?php

class FluentDecoratorWrapper
{
    protected $obj;

    public function __construct($obj)
    {
        $this->obj = $obj;
    }

    public function __call($name, $args)
    {
        if (method_exists($this->obj, $name)) {
            call_user_func_array([$this->obj, $name], $args);
            
            return $this->obj;
        } 
    }
}

class Sample
{
    protected $name;

    protected $year;

    public function setName($v)
    {
        $this->name = $v;
    }
    
    public function setYear($v)
    {
        $this->year = $v;
    }
}

$obj = new Sample();
$obj = new FluentDecoratorWrapper($obj);

$obj->setName('teste')
    ->setYear(1);

var_dump($obj->setName('teste'));
