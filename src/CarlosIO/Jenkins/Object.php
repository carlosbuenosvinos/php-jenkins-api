<?php
namespace CarlosIO\Jenkins;

class Object
{
    protected $_json;

    public function __construct($json)
    {
        $this->_json = $json;
    }

    protected function _getItem($propertyName, $object)
    {
        $object = "CarlosIO\\Jenkins\\" . $object;
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

	  $object = "CarlosIO\\Jenkins\\" . $object;
        foreach ($this->_json->{$propertyName} as $item) {
            $items[] = new $object($item);
        }

        return $items;
    }

    public function toArray()
    {
        return json_decode(json_encode($this->_json), true);
    }
}
