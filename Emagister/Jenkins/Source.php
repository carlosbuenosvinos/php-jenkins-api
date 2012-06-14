<?php
namespace Emagister\Jenkins;

require_once 'Emagister/Jenkins/Job.php';

use Emagister\Jenkins\Job;

class Source
{
    private $_json;

    public function __construct($url)
    {
        $json = file_get_contents($url);
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

