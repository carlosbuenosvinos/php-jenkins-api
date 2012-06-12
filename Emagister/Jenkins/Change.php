<?php
namespace Emagister\Jenkins;

require_once 'Emagister/Jenkins/Object.php';
require_once 'Emagister/Jenkins/Author.php';

use Emagister\Jenkins\Object;
use Emagister\Jenkins\Author;

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
