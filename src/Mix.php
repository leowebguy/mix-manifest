<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2023, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest;

use Craft;
use craft\base\Plugin;
use leowebguy\mixmanifest\services\MixService;
use leowebguy\mixmanifest\twigextensions\MixExtension;

class Mix extends Plugin
{
    // Properties
    // =========================================================================

    public static mixed $plugin;

    public bool $hasCpSection = false;

    public bool $hasCpSettings = false;

    // Public Methods
    // =========================================================================

    /**
     * @return void
     */
    public function init(): void
    {
        parent::init();
        self::$plugin = $this;

        if (!$this->isInstalled) {
            return;
        }

        $this->setComponents([
            'mixService' => MixService::class
        ]);

        // Register extension
        Craft::$app->view->registerTwigExtension(new MixExtension());

        Craft::info(
            'Mix Manifest plugin loaded',
            __METHOD__
        );
    }
}
