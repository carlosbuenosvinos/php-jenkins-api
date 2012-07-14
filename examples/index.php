<?php
require_once __DIR__ . '/../vendor/autoload.php';

use CarlosIO\Jenkins\Dashboard;
use CarlosIO\Jenkins\Source;
use CarlosIO\Jenkins\Job;
use CarlosIO\Jenkins\Author;

// Add domain to users (comitters)
Author::setDomain('<your_domain>');

$dashboard = new Dashboard();
$dashboard->addSource(new Source('http://ci.jenkins-ci.org/view/All/api/json/?depth=2'));
$jobs = $dashboard->getJobs();
usort($jobs, "CarlosIO\\Jenkins\\Job::sort");
print_r($jobs);
