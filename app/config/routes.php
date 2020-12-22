<?php

use Core\Router;

// Auth Controllers
Router::add('login', '/login', \App\Controllers\Common\Auth\LoginController::class, 'login');
Router::add('register', '/register', \App\Controllers\Common\Auth\RegisterController::class, 'register');
Router::add('logout', '/logout', \App\Controllers\Common\Auth\LogoutController::class, 'logout');
Router::add('install', '/install', \App\Controllers\Common\InstallController::class, 'install');

// Common Routes
Router::add('index', '/', \App\Controllers\Common\HomeController::class);
Router::add('index2', '/index', \App\Controllers\Common\HomeController::class);
Router::add('feedback', '/feedback', \App\Controllers\Common\FeedbackController::class);

// API Routes
Router::add('api_feedback_get', '/api/feedback/get', \App\Controllers\Common\API\FeedbackApiController::class);
Router::add('api_feedback_create', '/api/feedback/create', \App\Controllers\User\API\FeedbackApiController::class, 'create');