<?php

namespace Plugin\TwigExtensionSample\ServiceProvider;

use Silex\Application as BaseApplication;
use Silex\ServiceProviderInterface;

class TwigExtensionSampleServiceProvider implements ServiceProviderInterface
{
    public function register(BaseApplication $app)
    {
        $app['twig'] = $app->share($app->extend('twig', function (\Twig_Environment $twig, \Silex\Application $app) {
            $twig->addFunction(new \Twig_SimpleFunction('TwigExtensionSample_getMessage', function () use ($app) {
                return 'Hello.';
            }));

            // 商品を取得するTwig拡張関数
            $twig->addFunction(new \Twig_SimpleFunction('TwigExtensionSample_getProduct', function ($id) use ($app) {
                return $app['eccube.repository.product']->get($id);
            }));

            return $twig;
        }));
    }

    public function boot(BaseApplication $app)
    {
    }
}
