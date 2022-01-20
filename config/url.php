<?php
//$config['BASE_URL'] = 'http://localhost:8080/';

$BASE_URL = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI'] . '?') . '/';


