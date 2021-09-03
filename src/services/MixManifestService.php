<?php
/**
 * A minimal Craft 3 plugin to load assets from `mix-manifest.json`
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest\services;

use craft\base\Component;
use yii\web\HttpException;

/*
 * MixManifestService
 */

class MixManifestService extends Component
{
    // Public Methods
    // =========================================================================
    public function read($file, $manifest)
    {
        if (file_exists($manifest)) {
            $jsonManifest = @json_decode(
                @file_get_contents($manifest), true, 512, JSON_THROW_ON_ERROR
            );
        }

        if (isset($jsonManifest[$file])) {
            return $jsonManifest[$file];
        }

        throw new HttpException(500, "File '{$file}' not defined in '{$manifest}'");
    }
}
