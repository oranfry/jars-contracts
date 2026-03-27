<?php

namespace OranFry\Jars\Contract;

interface Config
{
    public function __construct();
    public function credentialsCorrect(?string $username = null, ?string $password = null): bool;
    public function download_fields(): array;
    public function float_dp(): array;
    public function linetypes(): array;
    public function report_fields(): array;
    public function reports(): array;
    public function respect_newline_fields(): array;
    public function tables(): array;
}
