<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit663b4bcb7958188d03384af257414380
{
    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit663b4bcb7958188d03384af257414380::$classMap;

        }, null, ClassLoader::class);
    }
}
