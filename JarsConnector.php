<?php

namespace OranFry\Jars\Contract;

use OranFry\Jars\Client\HttpClient;
use OranFry\Jars\Core\Jars;

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
        if (preg_match('/^([^,]+),([^,]+),([^,]+),([^,]+),([^,]+)/', $connection_string, $matches)) {
            [, $portalClass, $dbHome, $chainRel, $indexRel, $reportsRel] = $matches;
        } elseif (preg_match('/^([^,]+),([^,]+),([^,]+),([^,]+)/', $connection_string, $matches)) {
            [, $portalClass, $chainHome, $indexHome, $reportsHome] = $matches;
        } elseif (preg_match('/^([^,]+),([^,]+)/', $connection_string, $matches)) {
            [, $portalClass, $dbHome] = $matches;
        } else {
            throw new ConnectionStringException('Invalid local connection string. Should be in format "local:{portal_class},{db_home}"');
        }

        if (!isset($chainHome)) {
            $chainHome = $dbHome . '/' . ($chainRel ?? 'chain');
        }

        if (!isset($indexHome)) {
            $indexHome = $dbHome . '/' . ($indexRel ?? 'index');
        }

        if (!isset($reportsHome)) {
            $reportsHome = $dbHome . '/' . ($reportsRel ?? 'reports');
        }

        return Jars::of(new $portalClass, $chainHome, $indexHome, $reportsHome);
    }

    private static function connectRemote(string $connection_string): HttpClient
    {
        return HttpClient::of($connection_string);
    }
}
