<?php

namespace Plugin\TwigExtensionSample\ServiceProvider;

use Plugin\TwigExtensionSample\Twig\Extension\ProductExtension;
use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class TwigExtensionSampleServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $app['twig'] = $app->share($app->extend('twig', function (\Twig_Environment $twig, \Silex\Application $app) {
            // 無名関数を直接登録する場合
            $twig->addFunction(new \Twig_SimpleFunction('TwigExtensionSample_getMessage', function () use ($app) {
                return 'Hello.';
            }));

            // TwigExtensionクラスに分割する場合
            $twig->addExtension(new ProductExtension($app));

            return $twig;
        }));
    }

    public function boot(BaseApplication $app)
    {
    }
}
