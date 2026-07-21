<?php
// includes/env_loader.php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Carrega o .env na raiz do projeto (um nível acima de /includes)
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();