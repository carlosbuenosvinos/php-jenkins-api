<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Object;
use CarlosIO\Jenkins\Build;

class Job extends Object
{
    public function getName()
    {
        return $this->_json->name;
    }
    
    public function getDisplayName()
    {
        return $this->_json->displayName;
    }

    public function getDescription()
    {
        return $this->_json->description;
    }

    public function getUrl()
    {
        return $this->_json->url;
    }

    public function isBuildable()
    {
        return $this->_json->buildable == 'true';
    }

    public function getColor()
    {
        return $this->_json->color;
    }

    public function isInProgress()
    {
        return strpos($this->_json->color, 'anime') !== false;
    }

    public function isFailed()
    {
        return strpos($this->_json->color, 'red') !== false;
    }

    public function isSuccess()
    {
        return strpos($this->_json->color, 'blue') !== false;
    }

    public function isAborted()
    {
        return strpos($this->_json->color, 'aborted') !== false;
    }

    public function isDisabled()
    {
        return strpos($this->_json->color, 'disabled') !== false;
    }

    public static function sort($jobA, $jobB)
    {
        return $jobA->getOrder() < $jobB->getOrder();
    }

    public function getOrder()
    {
        $score = 0;
        $score += $this->isFailed() ? 100 : 0;
        $score += $this->isSuccess() ? 50 : 0;
        $score += $this->isInProgress() ? 10 : 0;
        $score += $this->isAborted() ? 30 : 0;
        return $score;
    }

    public function getBootstrapStatus()
    {
        if ($this->isFailed()) {
            return 'error';
        }

        if ($this->isSuccess()) {
            return 'success';
        }

        if ($this->isAborted()) {
            return 'alert';
        }

        return 'info';
    }

    public function getBootstrapProgressBarStatus()
    {
        if ($this->isFailed()) {
            return 'danger';
        }

        if ($this->isSuccess()) {
            return 'success';
        }

        if ($this->isAborted()) {
            return 'warning';
        }

        return 'info';
    }

    public function getLastBuild()
    {
        return $this->_getBuild('lastBuild');
    }

    public function getLastUnstableBuild()
    {
        return $this->_getBuild('lastUnstableBuild');
    }

    public function getLastUnsuccessfulBuild()
    {
        return $this->_getBuild('lastUnsuccessfulBuild');
    }

    public function getBuilds()
    {
        return $this->_getItems('builds', 'Build');
    }

    public function getProperties()
    {
        $properties = array();
        if (!isset($this->_json->property)) {
            return $properties;
        }

        foreach ($this->_json->property as $name => $value) {
            $properties[] = new Property($name, $value);
        }

        return $properties;
    }

    private function _getBuild($property)
    {
        return $this->_getItem($property, 'Build');
    }
}
