<?php

namespace jars\contract;

use jars\client\HttpClient;
use jars\Jars;

class JarsConnector
{
    public static function connect(string $connection_string): Client
    {
        if (!preg_match('/^(local|remote):(.*)/', $connection_string, $matches)) {
            throw new ConnectionStringException('Invalid protocol. Must be local: or remote:.');
        }

        if ($matches[1] === 'local') {
            return static::connectLocal($matches[2]);
        }

        return static::connectRemote($matches[2]);
    }

    private static function connectLocal(string $connection_string): Jars
    {
        if (!preg_match('/^([^:]+),(.*)/', $connection_string, $matches)) {
            throw new ConnectionStringException('Invalid local connection string. Should be in format "local:{portal_class},{db_home}"');
        }

        return Jars::of(new $matches[1], $matches[2]);
    }

    private static function connectRemote(string $connection_string): HttpClient
    {
        return HttpClient::of($connection_string);
    }
}
