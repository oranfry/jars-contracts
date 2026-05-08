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
        $parts = explode(',', $connection_string);

        switch (count($parts)) {
            case 2:
                [$portalClass, $dbHome] = $parts;
                break;

            case 5:
                [$portalClass, $chainHome, $indexHome, $reportsHome, $masterHome] = $parts;
                break;

            case 6:
                [$portalClass, $dbHome, $chainRel, $indexRel, $reportsRel, $masterRel] = $parts;
                break;

            default:
                throw new ConnectionStringException('Invalid local connection string"');
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

        if (!isset($masterHome)) {
            $masterHome = $dbHome . '/' . ($masterRel ?? 'master');
        }

        return Jars::of(new $portalClass, $chainHome, $indexHome, $reportsHome, $masterHome);
    }

    private static function connectRemote(string $connection_string): HttpClient
    {
        return HttpClient::of($connection_string);
    }
}
