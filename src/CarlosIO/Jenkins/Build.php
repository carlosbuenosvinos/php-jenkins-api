<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Object;
use CarlosIO\Jenkins\ChangeSet;

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

    public function getResult()
    {
        return $this->_json->result;
    }

    public function getDuration()
    {
        return $this->_json->duration;
    }

    public function getTimestamp()
    {
        return $this->_json->timestamp;
    }

    public function getEstimatedDuration()
    {
        return $this->_json->estimatedDuration;
    }

    public function getProgress()
    {
        if ($this->getDuration() <= 0) {
            return 100;
        }

        return min(100, number_format($this->estimatedDuration() / $this->getDuration()) * 100);
    }

    public function isBuilding()
    {
        return $this->_json->building == 'true';
    }

    public function getUrl()
    {
        return $this->_json->url;
    }

    public function getArtifacts()
    {
        return $this->_json->artifacts;
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

