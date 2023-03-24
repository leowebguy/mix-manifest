<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest;

use Craft;
use craft\base\Plugin;
use leowebguy\mixmanifest\twigextensions\MixTwigExtension;

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

        // Register extension
        Craft::$app->view->registerTwigExtension(new MixTwigExtension());

        Craft::info(
            'Mix Manifest plugin loaded',
            __METHOD__
        );
    }
}
