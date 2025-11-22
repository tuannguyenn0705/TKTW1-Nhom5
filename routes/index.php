<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/'         => (new HomeController)->index(),
        'login'         => (new HomeController)->login(),
  'dangki'         => (new HomeController)->dangki(),


};