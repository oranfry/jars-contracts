<?php

namespace OranFry\Jars\Contract;

interface Client
{
    public function delete(string $linetype_name, string $id): array;
    public function extra(?string $key = null);
    public function fields(string $linetype_name): array;
    public function flatten(?object $object = null): ?object;
    public function get(string $linetype_name, string $id): ?object;
    public function group(string $report_name, string $group = '', int|true|null $min_version = null);
    public function groups(string $report_name, string $prefix = '', int|true|null $min_version = null): array;
    public function h2n(string $h): ?int;
    public function info(?string $varname = null): array|string|null;
    public function linetypes(?string $report_name = null): array;
    public function login(?string $username = null, ?string $password = null): ?string;
    public function logout(): bool;
    public function n2h(int $n): string;
    public function persist(): self;
    public function preview(array $lines, ?int $base_version = null): array;
    public function record(string $table_name, string $id, ?string &$content_type = null, ?string &$filename = null): ?string;
    public function reports(): array;
    public function save(array $lines, ?int $base_version = null): array;
    public function saveOne(object $line, ?int $base_version = null): object;
    public function token(?string $token = null): self|string|null;
    public function touch(): object;
    public function version(): ?int;
}
