<?php

namespace Thenbsp\WechatBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $rootNode = $builder->root('thenbsp_wechat');
        $rootNode
            ->children()
                ->arrayNode('wechat')
                    ->isRequired()
                    ->children()
                        ->scalarNode('appid')
                            ->isRequired()
                        ->end()
                        ->scalarNode('appsecret')
                            ->isRequired()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('cache_driver')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('id')
                            ->defaultNull()
                        ->end()
                    ->end()
                ->end();

        return $builder;
    }
}
