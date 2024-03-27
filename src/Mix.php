<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2024, leowebguy
 */

namespace leowebguy\mixmanifest;

use Craft;
use craft\base\Plugin;
use leowebguy\mixmanifest\services\MixService;
use leowebguy\mixmanifest\twigextensions\MixExtension;

class Mix extends Plugin
{
    public bool $hasCpSection = false;

    public bool $hasCpSettings = false;

    public function init(): void
    {
        parent::init();

        if (!$this->isInstalled) {
            return;
        }

        $this->setComponents([
            'mixService' => MixService::class
        ]);

        Craft::$app->view->registerTwigExtension(new MixExtension);

        Craft::info(
            'Mix Manifest plugin loaded',
            __METHOD__
        );
    }
}
