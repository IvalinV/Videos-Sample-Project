<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('slugify', [$this, 'convertToSlug']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'convertToSlug']),
        ];
    }

    public function convertToSlug($value)
    {
        $string = preg_replace('/ +/', '-' , $value);
        $string = mb_strtolower(preg_replace('/^A-Za-z0-9 +/', '', $string), 'UTF-8');

        return $string;
    }
}