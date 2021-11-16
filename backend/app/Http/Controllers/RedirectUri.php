<?php
declare(strict_types=1);

namespace App\Http\Controllers;

class RedirectUri
{
    public function __invoke()
    {
        dump($_GET['code']);
    }
}
