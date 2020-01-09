<?php

    require __DIR__.'/../vendor/autoload.php';

    use Helper\CurlTool;

    $obj = new CurlTool();

    var_dump($obj->curlRequest('',[]));