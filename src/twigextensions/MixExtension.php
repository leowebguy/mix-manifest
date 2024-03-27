<?php
/**
 * A minimal plugin to load assets from mix-manifest.json
 *
 * @author     Leo Leoncio
 * @see        https://github.com/leowebguy
 * @copyright  Copyright (c) 2024, leowebguy
 */

namespace leowebguy\mixmanifest\twigextensions;

use leowebguy\mixmanifest\Mix;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MixExtension extends AbstractExtension
{
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
        return Mix::getInstance()->mixService->read($file, $manifest);
    }
}
