<?php
include_once 'dashboard.php';
include_once 'database.php';
include_once 'add_contact.php';
include_once 'insert_contact.php';
include_once 'edit_contact.php';
include_once 'update_contact.php';
include_once 'delete_contact.php';

$url = implode("/", 
            array_filter(
                explode("/", 
                    str_replace($_ENV['BASEDIR'], "", 
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );

# GET
route('/', 'get', function () { 
    include 'dashboard.php';
});

route('login', 'get', function () { 
    include 'login.html';
});

route('register', 'get', function () { 
    include 'register.html';
});

route('dashboard', 'get', function () { 
    include 'dashboard.php';
});

route('contacts/add', 'get', function () { 
    include 'add_contact.php';
});

route('contacts/edit', 'get', function () { 
    include 'edit_contact.php';
});

route('contacts/remove', 'get', function () { 
    include 'delete_contact.php';
});

# POST
route('login', 'post', function () { 
});

route('register', 'post', function () { 
});

route('contacts/add', 'post', function () { 
});

route('contacts/edit', 'post', function () { 
});

if (!in_array($url, $urls['routes'])) {
    header('Location: '.BASEURL);
}

$call = $urls[$_SERVER['REQUEST_METHOD']][$url];
$call();
?>
