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

Usage
=====
Usage is fairly straightforward:

    include '/path/to/library/Emagister/Jenkins/_autoload.php';
    use Emagister\Jenkins\Dashboard;
    use Emagister\Jenkins\Source;

    $dashboard = new Dashboard();
    $dashboard->addSource(new Source('http://ci.jenkins-ci.org/view/All/api/json/?depth=2'));

    print_r($dashboard->getJobs());

Autoloading
===========
Emagister\Jenkins follows the PSR-0 standard for class naming conventions, meaning
any PSR-0-compliant class loader will work. To simplify things out of the box,
the component contains an "\_autoload.php" file which will register an autoloader
for the Emagister\Jenkins component with spl_autoload. You can simply include that
file, and start using Emagister\Jenkins.