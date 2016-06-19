<?php

require __DIR__ . '/../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $query = $_POST['query'];
    $cmd = 'composer require ' . $query;

    $process = new \Symfony\Component\Process\Process($cmd, realpath(__DIR__ . '/../'), [
        'HOME' => '/home/tamboer',
    ]);
    $process->start();
    $process->wait();

    if (strpos($process->getErrorOutput(), 'Nothing to install or update') !== false) {
        var_dump('PLUGIN ALREADY INSTALLED');
    } elseif (strpos($process->getErrorOutput(), 'Updating dependencies') !== false) {
        var_dump('PLUGIN INSTALLED');
    } elseif (strpos($process->getErrorOutput(), 'Could not find package asd at any version for your minimum-stability') !== false) {
        var_dump('PLUGIN NOT FOUND');
    }

    echo '<h2>Exit Code</h2>';
    var_dump($process->getExitCode());
    var_dump($process->getExitCodeText());

    echo '<h2>Output</h2>';
    echo '<pre>' . $process->getOutput() . '</pre>';

    echo '<h2>Error Output</h2>';
    echo '<pre>' . $process->getErrorOutput() . '</pre>';
}

?>

<h2>Install Plugin</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="query" value="" tabindex="1">
    <input type="submit" name="install" value="Install">
</form>
