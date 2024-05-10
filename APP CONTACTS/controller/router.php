<?php
include_once 'config/static.php';
include_once 'controller/main.php';

# GET
Router::url('/', 'get', function () { return view('home'); });
Router::url('/login', 'get', 'AuthController::login');
Router::url('/register', 'get', 'AuthController::register');
Router::url('/dashboard', 'get', 'DashboardController::index');
Router::url('/dashboard/admin', 'get', 'DashboardController::admin');
Router::url('/dashboard/contacts', 'get', 'DashboardController::contacts');
Router::url('/dashboard/logout', 'get', 'AuthController::logout');
Router::url('/contacts/getContactById', 'get', 'ContactController::getContactById');

# POST
Router::url('/login', 'post', 'AuthController::saveLogin');
Router::url('/register', 'post', 'AuthController::saveRegister');
Router::url('/contacts/insertData', 'post', 'ContactController::insertData');
Router::url('/contacts/updateData', 'post', 'ContactController::updateData');
Router::url('/contacts/deleteContactController', 'post', 'ContactController::deleteContactController');

new Router();
?>
