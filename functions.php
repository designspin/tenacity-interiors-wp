<?php 

$framework_includes = [
    'vendor/autoload.php',
    'lib/assets/JsonManifest.php',
    'lib/setup.php',
    'lib/extras.php',
    'lib/custom-post-types.php',
    'lib/titles.php',
    'lib/wrapper.php',
    'lib/hookcontrol.php'
];

foreach ($framework_includes as $file) {
    if(!$filepath = locate_template($file)) {
        trigger_error(sprintf(__('Error locating %s for inclusion', 'tenacity_interiors'), $file), E_USER_ERROR);
    }

    require_once $filepath;
}

unset($file, $filepath);