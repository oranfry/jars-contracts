<?php

namespace OranFry\Jars\Contract;

use OranFry\Jars\Core\Sequence;

interface Config
{
    public function __construct();
    public function credentialsCorrect(?string $username = null,?string $password = null): bool;
    public function extra(): array;
    public function linetypes(): array;
    public function reports(): array;
    public function sequence(): Sequence;
    public function tables(): array;
}
