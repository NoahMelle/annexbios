<?php
include("core/db_connect.php");
include("core/router.php");

if ($isApiCall) {
    include('./api/' . $page);
    exit();
} else {
    include("model/{$model}.php");

    $mustache = new Mustache_Engine(array(
        'template_class_prefix' => '__MyTemplates_',
        'cache' => dirname(__FILE__) . '/tmp/cache/mustache',
        'cache_file_mode' => 0666, // Please, configure your umask instead of doing this :)
        'cache_lambda_templates' => true,
        'extension' => '.html',
        'loader' => new Mustache_Loader_FilesystemLoader(
            dirname(__FILE__) . '/views',
            array('extension' => '.html')
        ),
        'partials_loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views/partials'),
        'escape' => function ($value) {
            return htmlspecialchars($value, ENT_COMPAT, 'UTF-8');
        },
        'charset' => 'ISO-8859-1',
        'logger' => new Mustache_Logger_StreamLogger('php://stderr'),
        'strict_callables' => true,
        'pragmas' => [Mustache_Engine::PRAGMA_FILTERS],
    ));

    $headertpl = $mustache->loadTemplate('header'); // loads __DIR__.'/views/foo.mustache';
    echo $headertpl->render($data);

    $tpl = $mustache->loadTemplate($template); // get $template from router
    echo $tpl->render($data);

    $footertpl = $mustache->loadTemplate('footer'); // loads __DIR__.'/views/foo.mustache';
    echo $footertpl->render($data);


    $con->close();
}
