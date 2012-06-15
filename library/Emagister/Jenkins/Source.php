<?php
namespace Emagister\Jenkins;

use Emagister\Jenkins\Job;
use Emagister\Jenkins\Exception\SourceNotAvailableException;

class Source
{
    private $_url;
    private $_json;

    public function __construct($url)
    {
        $this->_url = $url;

        $json = @file_get_contents($url);
        $this->_json = @json_decode($json);

        if (!$this->_json) {
            throw new SourceNotAvailableException();
        }
    }

    public function getJobs()
    {
        $array = $this->_json->jobs;
        $jobs = array();
        foreach($array as $row) {
            $jobs[] = new Job($row);
        }

        return $jobs;
    }
}

