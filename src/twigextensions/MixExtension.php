<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2023, leowebguy
 * @license    MIT
 */

namespace leowebguy\mixmanifest\twigextensions;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use leowebguy\mixmanifest\Mix;

class MixExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('mix', [$this, 'mix'])
        ];
    }

    /**
     * @param string|null $file
     * @param string $manifest
     * @return mixed
     */
    public function mix(string $file = null, string $manifest = 'mix-manifest.json'): mixed
    {
        return Mix::$plugin->mixService->read($file, $manifest);
    }
}
