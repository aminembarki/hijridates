<?php
/**
 * hijri-dates plugin for Craft CMS 3.x
 *
 *  convert Gregorian date to Hijri date and vice versa.
 *
 * @link      https://github.com/aminembarki
 * @copyright Copyright (c) 2019 Amine Mbarki
 */

namespace aminembarki\hijridates\twigextensions;

use aminembarki\hijridates\HijridatesTwigExtension;

use Craft;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Amine Mbarki
 * @package   Hijridates
 * @since     1.0.0
 */
class HijridatesTwigExtension extends \Twig_Extension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'Hijridates';
    }

    /**
     * Returns an array of Twig filters, used in Twig templates via:
     *
     *      {{ 'something' | someFilter }}
     *
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('hdate', [$this, 'convertToHijri']),
        ];
    }

    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     *
    * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('convertToHijri', [$this, 'convertToHijri']),
        ];
    }

    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param null $text
     *
     * @return string
     */
    public function convertToHijri($text = null)
    {
        
        $date = \GeniusTS\HijriDate\Hijri::convertToHijri($text);

        return $date;
    }
}
