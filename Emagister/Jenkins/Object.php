<?php
namespace Emagister\Jenkins;

class Object
{
    protected $_json;

    public function __construct($json)
    {
        $this->_json = $json;
    }
}
