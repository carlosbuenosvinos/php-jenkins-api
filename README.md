Emagister\Jenkins
=================
Emagister\Jenkins is a Jenkins API written in PHP
for PHP 5.3+. It has been born for Dashboard
and extreme feedback purposes.

At this time, it has support for the following:

- Integrating different Jenkins information
- Accessing to:
  - Jobs
  - ChangeSets
  - Changes
  - Authors
  - Properties

Requiring in another project
============================
Using composer:

```
    "require": {
        "emagister/jenkins": "dev-master"
    }
```

Usage
=====
Usage is fairly straightforward,

```php
<?php
    require_once __DIR__ . '/../vendor/autoload.php';

    use Emagister\Jenkins\Dashboard;
    use Emagister\Jenkins\Source;

    $dashboard = new Dashboard();
    $dashboard->addSource(new Source('http://ci.jenkins-ci.org/view/All/api/json/?depth=2'));
    // Add as many sources as you want
    // ...

    print_r($dashboard->getJobs());
```