<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$available_langs = ['pt', 'en'];
$default_lang = 'pt';

// 1) prioridade ao parâmetro ?lang=en (troca e guarda em sessão)
if (isset($_GET['lang']) && in_array($_GET['lang'], $available_langs, true)) {
    $_SESSION['lang'] = $_GET['lang'];
}

// 2) sessão
$current_lang = $_SESSION['lang'] ?? $default_lang;

if (!in_array($current_lang, $available_langs, true)) {
    $current_lang = $default_lang;
}

$translations = require __DIR__ . '/../lang/' . $current_lang . '.php';

/**
 * Devolve o texto traduzido para a chave indicada.
 */
function t(string $key): string
{
    global $translations;
    return $translations[$key] ?? $key;
}

/**
 * Imprime o texto já escapado para HTML.
 */
function te(string $key): void
{
    echo htmlspecialchars(t($key), ENT_QUOTES, 'UTF-8');
}

/**
 * Carrega as traduções de um idioma específico (usado fora do
 * fluxo normal de página, por exemplo no envio de e-mails).
 */
function loadTranslations(string $lang): array
{
    global $available_langs, $default_lang;

    if (!in_array($lang, $available_langs, true)) {
        $lang = $default_lang;
    }

    return require __DIR__ . '/../lang/' . $lang . '.php';
}

if (!function_exists('e')) {
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('tc')) {

    function tc($value): string
    {
        global $current_lang, $default_lang;

        if (is_array($value)) {
            return $value[$current_lang]
                ?? $value[$default_lang]
                ?? (string) reset($value);
        }

        return (string) ($value ?? '');
    }
}