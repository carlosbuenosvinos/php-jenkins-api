<?php
namespace CarlosIO\Jenkins;

use CarlosIO\Jenkins\Job;
use CarlosIO\Jenkins\Exception\SourceNotAvailableException;

class Source
{
    private $_url;
    private $_json;

    public function __construct($url)
    {
        $this->_url = $url;

        $json = @file_get_contents($url);
	  if (!$json) {
	     throw new SourceNotAvailableException(sprintf("Sources can not be downloaded from %s", $this->_url));
	  }
	  
        $this->_json = @json_decode($json);
        if (!$this->_json) {
            throw new SourceNotAvailableException(sprintf("Downloaded sources seems to be invalid JSON string."));
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

