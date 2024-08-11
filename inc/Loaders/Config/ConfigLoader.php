<?php

namespace Webscroll\DiviChild\Loaders\Config;

use DirectoryIterator;

class ConfigLoader
{
    private static ?ConfigLoader $instance = null;
    public array $configurations = [];

    private function __construct()
    {
        $this->load();
    }

    public static function getInstance(): ConfigLoader
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function load($name = null): void
    {
        if (!$name) {
            foreach (new DirectoryIterator(__DIR__ . '/constants') as $file) {
                if ($file->isFile() && $file->getExtension() == 'php') {
                    $name = $file->getBasename('.php');
                    $this->load($name);
                }
            }
        } else {
            $filePath = __DIR__ . "/constants/$name.php";
            if (!isset($this->configurations[$name])) {
                $this->configurations[$name] = require_once $filePath;
            }
        }
    }

    public static function get($key)
    {
        return self::getInstance()->configurations[$key];
    }
}