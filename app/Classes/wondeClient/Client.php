<?php

namespace App\Classes\wondeClient;

use Wonde\Exceptions\InvalidTokenException;

class Client
{

    /**
     * @throws InvalidTokenException
     */
    public static function getWondeClient(): \Wonde\Client
    {
        return new \Wonde\Client('3cf21754b3d64f3b7d917e139d8287df260dfbf5');
    }
}
