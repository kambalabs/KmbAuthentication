<?php
namespace KmbAuthenticationTest;

use KmbCoreTest\AbstractBootstrap;
use Zend\Stdlib\ArrayUtils;

require dirname(dirname(dirname(__DIR__))) . '/KmbCore/test/KmbCoreTest/AbstractBootstrap.php';

class Bootstrap extends AbstractBootstrap
{
    public static function getApplicationConfig()
    {
        return ArrayUtils::merge(
            parent::getApplicationConfig(),
            array(
                'modules' => array(
                    'KmbAuthentication',
                )
            )
        );
    }
}

Bootstrap::init();
Bootstrap::chroot();
