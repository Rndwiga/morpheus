<?php

namespace Tyondo\Email;


use function Composer\Autoload\includeFile;

class TyondoEmail
{
    public static function routes()
    {
        includeFile(__DIR__.'/../Routes/web.php');
    }
}