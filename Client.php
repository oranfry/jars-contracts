<?php

namespace jars;

interface Client
{
    public abstract function __construct($auth = null);
    public abstract function delete($linetype, $id);
    public abstract function fields($linetype);
    public abstract function get($linetype, $id);
    public abstract function groups(string $name, ?string $min_version = null);
    public abstract function login($username, $password);
    public abstract function logout();
    public abstract function preview(array $data);
    public abstract function record($table, $id);
    public abstract function report(string $name, string $group, ?string $min_version = null);
    public abstract function save(array $data);
    public abstract function touch();
    public abstract function unlink($linetype, $id, $parent);
    public abstract function version();
}
