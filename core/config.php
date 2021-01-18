<?php
require 'vendor/autoload.php';

date_default_timezone_set('Europe/Copenhagen');

if (IS_DEV) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

require 'Filer.php';
require 'Posts.php';
require 'Meta.php';
require 'Router.php';
require 'Url.php';

require 'Models/Post.php';

require 'constants.php';
require 'utilities.php';
require 'markdown.php';
require 'content.php';
require 'plugins.php';
require 'generators.php';

if (!file_exists(PAGES . '/default.md')) {
    die('You need at least a "default.md" file in your /site/pages folder');
}

require 'load-theme.php';
