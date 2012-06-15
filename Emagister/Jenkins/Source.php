<?php
namespace Emagister\Jenkins;

require_once __DIR__ . '/Job.php';
require_once __DIR__ . '/Exception/SourceNotAvailableException.php';

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
        if (!$json) {
            throw new SourceNotAvailableException();
        }

        $this->_json = json_decode($json);
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

