<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest\services;

Use Craft;
use craft\base\Component;

/*
 * MixManifestService
 */
class MixManifestService extends Component
{
    // Public Methods
    // =========================================================================
    public function read($file, $manifest)
    {
        if (@file_exists($manifest)) {
            $jsonManifest = @json_decode(
                @file_get_contents($manifest), true, 512, JSON_THROW_ON_ERROR
            );
        }

        if (isset($jsonManifest[$file])) {
            return $jsonManifest[$file];
        }

        Craft::error('Mix Manifest file is empty', __METHOD__);

        // fallback to file without versioning
        return $file . '?id=manifest-not-found';
    }
}
