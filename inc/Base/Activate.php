<?php
/**
 * @package  Builders_Hub
 */
namespace Inc\Base;

class Activate
{
    public static function activate() {
        flush_rewrite_rules();
    }
}