<?php

namespace App\Src\Services;

class Email
{
    private static $emailConfig;

    public static function send($message)
    {
        if (!isset(self::$emailConfig)) {
            self::$emailConfig = require_once '../config/email.php';
        }

        $to = self::$emailConfig['default']['recipient'];
        $from = self::$emailConfig['default']['recipient'];
        $subject = "UNDER VISION";
        $subject = "=?utf-8?B?".base64_encode($subject)."?=";
        $headers = "From: $from\r\nReply-to: $from\r\nContent-type:text/plain; charset=urf-8\r\n";

        mail($to, $subject, $message, $headers);
    }
}
