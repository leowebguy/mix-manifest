<?php
/**
 * A minimal Craft 3 plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest\twigextensions;

use leowebguy\mixmanifest\MixManifest;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use yii\web\HttpException;

/*
 * MixTwigExtension
 */

class MixTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================
    public function getFunctions()
    {
        return [
            new TwigFunction('mix', [$this, 'mix'])
        ];
    }

    public function mix(string $file = null, string $manifest = 'mix-manifest.json')
    {
        if (!isset($file) || empty($file)) {
            throw new HttpException(500, "You must provide the file name e.g. '/js/app.js'");
        }

        return MixManifest::$plugin->mixService->read($file, $manifest);
    }
}
