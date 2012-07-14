<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Object;
use CarlosIO\Jenkins\Change;
use CarlosIO\Jenkins\Revision;

class ChangeSet extends Object
{
    public function getRevisions()
    {
        $array = isset($this->_json->revisions) ? $this->_json->revisions : array();
        $items = array();
        foreach($array as $row) {
            $items[] = new Revision($row);
        }
        return $items;
    }

    public function getChanges()
    {
        $array = $this->_json->items;
        $items = array();
        foreach($array as $row) {
            $items[] = new Change($row);
        }
        return $items;
    }
}
