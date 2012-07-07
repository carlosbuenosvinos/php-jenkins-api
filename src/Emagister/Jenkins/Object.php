<?php
namespace Emagister\Jenkins;

class Object
{
    protected $_json;

    public function __construct($json)
    {
        $this->_json = $json;
    }

    protected function _getItem($propertyName, $object)
    {
        $object = "Emagister\\Jenkins\\" . $object;
        if (isset($this->_json->{$propertyName})) {
            return new $object($this->_json->{$propertyName});
        }

        return null;
    }

    protected function _getItems($propertyName, $object)
    {
        $items = array();
        if (!isset($this->_json->{$propertyName})) {
            return $items;
        }

        foreach ($this->_json->{$propertyName} as $item) {
            $items[] = new $object($item);
        }

        return $items;
    }
}
