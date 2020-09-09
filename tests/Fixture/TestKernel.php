<?php

namespace Zenstruck\RedirectBundle\Tests\Fixture;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class TestKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new \Zenstruck\RedirectBundle\ZenstruckRedirectBundle(),
            new \Zenstruck\RedirectBundle\Tests\Fixture\Bundle\TestBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(\sprintf('%s/config.yml', __DIR__));
    }

    public function getCacheDir()
    {
        return \sys_get_temp_dir().'/ZenstruckRedirectBundle/'.Kernel::VERSION.'/cache/'.$this->environment;
    }

    public function getLogDir()
    {
        return \sys_get_temp_dir().'/ZenstruckRedirectBundle/'.Kernel::VERSION.'/logs';
    }
}
