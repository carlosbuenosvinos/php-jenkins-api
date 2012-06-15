<?php
namespace Emagister\Jenkins;

require_once __DIR__ . '/Object.php';
require_once __DIR__ . '/Build.php';

use Emagister\Jenkins\Object;
use Emagister\Jenkins\Build;

class Job extends Object
{
    public function getName()
    {
        return $this->_json->name;
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
        if (isset($this->_json->lastBuild)) {
            return new Build($this->_json->lastBuild);
        }

        return null;
    }
}
