<?php
/**
 * Register application modules
 */

$application->registerModules(array(
    'comments' => array(
        'className' => 'Sample\Comments\Module',
        'path' => __DIR__ . '/../modules/comments/Module.php'
    )
));
