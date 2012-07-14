<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Object;
use CarlosIO\Jenkins\Author;

class Change extends Object
{
    public function getAffectedPaths()
    {
        return $this->_json->affectedPaths;
    }

    public function getAuthor()
    {
        return new Author($this->_json->author);
    }
}
