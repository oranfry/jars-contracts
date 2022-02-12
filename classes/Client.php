<?php

namespace jars\contract;

interface Client
{
    public function delete($linetype, $id);
    public function fields($linetype);
    public function get($linetype, $id);
    public function group(string $report, string $group, ?string $min_version = null);
    public function groups(string $report, ?string $min_version = null);
    public function login(string $username, string $password);
    public function logout();
    public function preview(array $data);
    public function record($table, $id);
    public function save(array $data, bool $dryrun = false);
    public function touch();
    public function unlink($linetype, $id, $parent);
    public function version();
}
