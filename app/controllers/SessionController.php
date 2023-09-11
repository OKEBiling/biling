<?php
class session {
    const SSO_NAMESPACE = 'metaOKEBiling';

    public static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION[self::SSO_NAMESPACE])) {
            $_SESSION[self::SSO_NAMESPACE] = [];
        }
    }

    public static function get($key) {
        self::startSession();
        return $_SESSION[self::SSO_NAMESPACE][$key] ?? null;
    }

    public static function set($key, $value) {
        self::startSession();
        $_SESSION[self::SSO_NAMESPACE][$key] = $value;
    }

    public static function setArray($array) {
        self::startSession();
        foreach ($array as $key => $value) {
            $_SESSION[self::SSO_NAMESPACE][$key] = $value;
        }
    }

    public static function remove($key) {
         self::startSession();
        unset($_SESSION[self::SSO_NAMESPACE][$key]);
    }

    public static function destroy() {
         self::startSession();
        $_SESSION[self::SSO_NAMESPACE] = [];
        session_destroy();
    }


    public static function getId() {
         self::startSession();
        return session_id();
    }

    public static function setCsrfToken() {
        self::startSession();
        if (!isset($_SESSION[self::SSO_NAMESPACE]['csrf_token'])) {
            $_SESSION[self::SSO_NAMESPACE]['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    public static function matchCsrfToken($value) {
        self::startSession();
        return $_SESSION[self::SSO_NAMESPACE]['csrf_token'] === $value;
    }
}



?>