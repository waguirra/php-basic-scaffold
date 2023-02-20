<?php
/**
 * @link https://github.com/waguirra/php-starter/blob/617b3c75bde14942c452c3b2af29c71580091898/src/Support/Passwd.php
 */
class Passwd
{
    private static $fail;

    public static function is(?string $passwd): bool
    {
        if (password_get_info($passwd)['algo']) {
            return true;
        }

        if(mb_strlen($passwd) < CONFIG_PASSWD_MIN_LEN || mb_strlen($passwd) > CONFIG_PASSWD_MAX_LEN) {
            $min = CONFIG_PASSWD_MIN_LEN;
            $max = CONFIG_PASSWD_MAX_LEN;
            self::$fail = new \Exception("A senha deve ter de {$min} á {$max} caracteres");
            return false;
        }

        return true;
    }

    public static function hash(string $passwd): string
    {
        if (!password_get_info($passwd)['algo']) {
            return password_hash($passwd, PASSWORD_DEFAULT);
        }

        if (password_needs_rehash($passwd, PASSWORD_DEFAULT)) {
            return password_hash($passwd, PASSWORD_DEFAULT);
        }

        return $passwd;
    }

    public static function confirm(string $passwd, ?string $passwd_re = null): bool
    {
        if (password_get_info($passwd)['algo']) {
            return true;
        }

        if ($passwd_re == null || $passwd != $passwd_re) {
            self::$fail = new \Exception("As senhas informada precisão ser iguais");
            return false;
        }

        return true;
    }

    public static function verify(string $passwd, string $hash): bool
    {
        return password_verify($passwd, $hash);
    }

    public static function fail(): \Exception
    {
        return self::$fail;
    }
}