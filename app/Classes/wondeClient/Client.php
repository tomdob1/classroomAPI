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
        return new \Wonde\Client(env('WONDE_CLIENT_KEY'));
    }
}
