<?php

namespace jars\contract;

interface Client
{
    public function delete($linetype, $id);
    public function fields($linetype);
    public function get($linetype, $id);
    public function group(string $report, string $group, ?string $min_version = null);
    public function groups(string $report, ?string $min_version = null);
    public function h2n(string $h);
    public function login(string $username, string $password);
    public function logout();
    public function n2h(int $n);
    public function preview(array $lines);
    public function record($table, $id, &$content_type = null);
    public function refresh() : string;
    public function save(array $lines);
    public function touch();
    public function version();
}
