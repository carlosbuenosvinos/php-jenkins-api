<?php
namespace Emagister\Jenkins;

require_once __DIR__ . '/Object.php';

use Emagister\Jenkins\Object;

class Revision extends Object
{
    public function getModule()
    {
        return $this->_json->module;
    }

    public function getRevision()
    {
        return $this->_json->revision;
    }
}
