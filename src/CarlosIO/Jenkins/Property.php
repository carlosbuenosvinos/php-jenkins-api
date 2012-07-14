<?php
namespace CarlosIO\Jenkins;

class Property
{
    private $_name;
    private $_value;

    public function __construct($name, $value)
    {
        $this->_name = $name;
        $this->_value = $value;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function getValue()
    {
        return $this->_value;
    }
}
