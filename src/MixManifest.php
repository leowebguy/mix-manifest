<?php
/**
 * A minimal Craft 3 plugin to load assets from `mix-manifest.json`
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest;

use leowebguy\mixmanifest\twigextensions\MixTwigExtension;

use Craft;
use craft\base\Plugin;

/*
 * Class MixManifest
 */

class MixManifest extends Plugin
{
    // Properties
    // =========================================================================
    public static $plugin;


    // Public Methods
    // =========================================================================
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        if (!$this->isInstalled) {
            return;
        }

        Craft::$app->view->registerTwigExtension(new MixTwigExtension());

        // log info
        Craft::info(
            Craft::t(
                'mix-manifest',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }
}
