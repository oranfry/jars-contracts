<?php

namespace jars;

interface Client
{
    public function delete($linetype, $id);
    public function fields($linetype);
    public function get($linetype, $id);
    public function groups(string $name, ?string $min_version = null);
    public function login($username, $password);
    public function logout();
    public function preview(array $data);
    public function record($table, $id);
    public function report(string $name, string $group, ?string $min_version = null);
    public function save(array $data);
    public function touch();
    public function unlink($linetype, $id, $parent);
    public function version();
}
