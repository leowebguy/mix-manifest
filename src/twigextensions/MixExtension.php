<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2021, leowebguy
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

    public function getFunctions(): array
    {
        return [
            new TwigFunction('mix', [$this, 'mix'])
        ];
    }

    public function mix(string $file = null, string $manifest = 'mix-manifest.json')
    {
        return Mix::$plugin->mixService->read($file, $manifest);
    }
}
