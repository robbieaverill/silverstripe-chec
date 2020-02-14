<?php

namespace Robbie\SilverstripeChec;

use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Convert;

class ChecShortcode
{
    use Configurable;

    /**
     * Path to Chec embeddable checkout JavaScript file
     *
     * @config
     * @var string
     */
    private static $javascript_url = 'https://assets.chec-cdn.com/js/embed.js';

    /**
     * Domain for hosted Chec checkout
     *
     * @config
     * @var string
     */
    private static $checkout_domain = 'https://checkout.chec.io';

    /**
     * ShortCode which adds a link to a Chec buy now popup window
     *
     * @param array $arguments
     * @param string $content
     * @return string
     */
    public static function getBuyNowButton($arguments, $content = null): string
    {
        if (isset($arguments['data-chec-product-id'])) {
            $id = Convert::raw2att($arguments['data-chec-product-id']);
            unset($arguments['data-chec-product-id']);
            $siteURL = self::config()->get('checkout_domain');

            $link = "<a href=\"$siteURL/{$id}\"";
            // Add all arguments as-is as we could potentially be receiving css class styles
            foreach ($arguments as $key => $val) {
                $val = Convert::raw2att($val);
                $link .= " {$key}=\"{$val}\" ";
            }
            $link .= ">{$content}</a>";
            return $link;
        }
        return '';
    }
}
