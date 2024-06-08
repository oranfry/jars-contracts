<?php

namespace jars\contract;

interface Client
{
    public function delete(string $linetype, string $id): array;
    public function fields(string $linetype): array;
    public function get(string $linetype, string $id): ?object;
    public function group(string $report, string $group = '', string|bool|null $min_version = null);
    public function groups(string $report, string $prefix = '', string|bool|null $min_version = null): array;
    public function h2n(string $h): ?int;
    public function linetypes(?string $report = null): array;
    public function login(string $username, string $password): ?string;
    public function logout(): bool;
    public function n2h(int $n): string;
    public function persist(): self;
    public function preview(array $lines, ?string $base_version = null): array;
    public function record(string $table, string $id, ?string &$content_type = null, ?string &$filename = null): ?string;
    public function reports(): array;
    public function save(array $lines, ?string $base_version = null): array;
    public function token(?string $token = null): self|string|null;
    public function touch(): object;
    public function version(): ?string;
}
