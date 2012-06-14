<?php
namespace Emagister\Jenkins;

require_once 'Emagister/Jenkins/Source.php';

use Emagister\Jenkins\Source;

class Dashboard
{
    private $_sources;

    public function __construct()
    {
        $this->_sources = array();
    }

    public function addSource(Source $source)
    {
        $this->_sources[] = $source;
    }

    public function getJobs()
    {
        $jobs = array();
        foreach ($this->_sources as $source) {
            $jobs = $jobs + $source->getJobs();
        }

        return $jobs;
    }
}

