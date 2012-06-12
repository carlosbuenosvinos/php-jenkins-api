<?php
namespace Emagister\Jenkins;

require_once 'Emagister/Jenkins/Object.php';
require_once 'Emagister/Jenkins/ChangeSet.php';

use Emagister\Jenkins\Object;
use Emagister\Jenkins\ChangeSet;

class Build extends Object
{
    public function getNumber()
    {
        return $this->_json->number;
    }

    public function getChangeSet()
    {
        return new ChangeSet($this->_json->changeSet);
    }

    public function getAuthors()
    {
        $changeSet = $this->getChangeSet();
        $changes = $changeSet->getChanges();

        $authors = array();
        foreach ($changes as $change) {
            $author = $change->getAuthor();
            $authors[md5(serialize($author))] = $author;
        }

        return array_values($authors);
    }
}

