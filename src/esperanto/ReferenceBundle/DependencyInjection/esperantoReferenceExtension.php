<?php

namespace esperanto\ReferenceBundle\DependencyInjection;

use esperanto\AdminBundle\DependencyInjection\SyliusResourceExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class esperantoReferenceExtension extends SyliusResourceExtension
{
    // You can choose your application name, it will use to prefix the configuration keys in the container.
    protected $applicationName = 'esperanto_reference';

    protected $bundleName = 'reference';

    protected $companyName = 'esperanto';

    // You can define where yours service definitions are
    protected $configDirectory = '/../Resources/config';

    // You can define what service definitions you want to load
    protected $configFiles = array(
        'services',
        'forms',
    );

    /**
     * {@inheritDoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $this->configure(
            $config,
            new Configuration(),
            $container,
            self::CONFIGURE_LOADER | self::CONFIGURE_DATABASE | self::CONFIGURE_PARAMETERS | self::CONFIGURE_ADMIN
        );

        $configuration = new Configuration();
        $processedConfig = $this->processConfiguration( $configuration, $config );
        $container->setParameter( 'esperanto_reference.reference_route', $processedConfig[ 'reference_route' ]);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
