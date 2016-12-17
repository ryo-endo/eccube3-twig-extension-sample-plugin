<?php
/*
 * EC-CUBE 3.0 TwigExtensionSample plugin
 *
 * @license UNLICENSE http://unlicense.org/UNLICENSE
 */

namespace Plugin\TwigExtensionSample\Twig\Extension;

use Eccube\Application;

class ProductExtension extends \Twig_Extension
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getName()
    {
        return 'ProductExtension';
    }

    public function getFunctions()
    {
        $functions = array(new \Twig_SimpleFunction('TwigExtensionSample_getProduct', array($this, 'getProduct')));

        return $functions;
    }

    /**
     * 商品の取得.
     *
     * @param int $id
     */
    public function getProduct($id)
    {
        return $this->app['eccube.repository.product']->get($id);
    }
}
