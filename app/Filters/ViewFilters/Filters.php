<?php
namespace CodeIgniter\View;

class Filters {
    public static function dingdong(string $value): string
    {
            return ucfirst(str_shuffle($value));
    }
}
