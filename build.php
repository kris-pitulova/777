<?php
define('BASEURI', __DIR__);
error_reporting(E_ERROR);

if(is_dir(BASEURI. '/core')) {
	$files = glob(BASEURI . '/core/*');
	foreach($files as $file){
	  if(is_file($file))
    unlink($file);
	}
	rmdir(BASEURI. '/core');
}


echo 'Installing composer...' . PHP_EOL;
$setupPath = BASEURI . DIRECTORY_SEPARATOR . 'composer-setup.php';
copy('https://getcomposer.org/installer', $setupPath);
if (hash_file('sha384', $setupPath) === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a')
{
	echo 'Installer verified' . PHP_EOL;
}
else {
	echo 'Installer corrupt' . PHP_EOL;
	unlink($setupPath);
}

shell_exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($setupPath));
unlink($setupPath);
echo 'Composer installed' . PHP_EOL;


if(file_exists('composer.phar')) {
	echo 'Installing dependencies' . PHP_EOL;
	shell_exec(escapeshellarg(PHP_BINARY) . ' composer.phar config vendor-dir "' . BASEURI . '"');
	shell_exec(escapeshellarg(PHP_BINARY) . ' composer.phar install');
	shell_exec(escapeshellarg(PHP_BINARY) . ' autoload.php');
}

if(!is_dir(BASEURI . '/log')) {
	mkdir(BASEURI . '/log');
}

$version = trim(shell_exec('git symbolic-ref --short -q HEAD'));
file_put_contents(BASEURI . '/version', $version);

echo '===================================' . PHP_EOL;
echo 'SUCCESS! You can execute index.php now' . PHP_EOL;
echo 'Installed version: ' . $version . PHP_EOL;
echo '===================================' . PHP_EOL;
?>
