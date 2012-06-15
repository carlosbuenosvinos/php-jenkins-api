<?php
namespace Emagister\Jenkins;

require_once __DIR__ . '/Object.php';
require_once __DIR__ . '/Change.php';
require_once __DIR__ . '/Revision.php';

use Emagister\Jenkins\Object;
use Emagister\Jenkins\Change;
use Emagister\Jenkins\Revision;

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
