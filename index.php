<?php
include("core/db_connect.php");
include("core/router.php");

include("model/{$model}.php");

$view = '';
if (!empty($_GET['view'])) {
    $view = htmlspecialchars($_GET['view']);
    $view = str_replace("/", "", $view);
}

$page = '';
$style = '';
$js = '';
$isApiCall = false;

$mustache = new Mustache_Engine(array(
    'template_class_prefix' => '__MyTemplates_',
    'cache' => dirname(__FILE__) . '/tmp/cache/mustache',
    'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
    'cache_lambda_templates' => true,
    'loader' => new Mustache_Loader_FilesystemLoader(
        dirname(__FILE__) . '/views',
        array('extension' => '.html') // Change this to your desired extension
    ),
    'partials_loader' => new Mustache_Loader_FilesystemLoader(
        dirname(__FILE__) . '/views/partials',
        array('extension' => '.html') // Change this to your desired extension for partials
    ),
    'escape' => function ($value) {
        return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
    },
    'charset' => 'ISO-8859-1',
    'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
    'strict_callables' => true,
    'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
));

if ($isApiCall) {
    require_once './api/' . $page;
    exit();
} else {
    $headertpl = $mustache->loadTemplate('header'); // loads __DIR__.'/views/header.html';
    echo $headertpl->render($data);

    $tpl = $mustache->loadTemplate($template); // loads __DIR__.'/views/{template}.html';
    echo $tpl->render($data);

    $footertpl = $mustache->loadTemplate('footer'); // loads __DIR__.'/views/footer.html';
    echo $footertpl->render($data);

    $con->close();
}
