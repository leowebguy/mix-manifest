<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2023, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest\services;

use Craft;
use craft\base\Component;
use craft\helpers\Json;

class MixService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * @param $file
     * @param $manifest
     * @return mixed|string
     */
    public function read($file, $manifest): mixed
    {
        if (@file_exists($manifest)) {
            $j = Json::decodeIfJson(
                @file_get_contents($manifest)
            );
        }

        if (isset($j[$file])) {
            return $j[$file];
        }

        Craft::error('Mix Manifest file is empty', __METHOD__);

        // Fallback to file without versioning
        return $file . '?id=manifest-not-found';
    }
}
