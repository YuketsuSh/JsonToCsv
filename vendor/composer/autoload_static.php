<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ca1d545cdf6b08bb82700cca2b08c81
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ca1d545cdf6b08bb82700cca2b08c81::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ca1d545cdf6b08bb82700cca2b08c81::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ca1d545cdf6b08bb82700cca2b08c81::$classMap;

        }, null, ClassLoader::class);
    }
}
