<?php

$db = [
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pw' => '',
    'db_name' => 'cms',
];

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

if (!$connection) {
    echo 'DB Error';
}