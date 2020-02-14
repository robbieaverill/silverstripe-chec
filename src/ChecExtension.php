<?php

namespace Robbie\SilverstripeChec;

use SilverStripe\CMS\Model\SiteTreeExtension;
use SilverStripe\View\Requirements;

class ChecExtension extends SiteTreeExtension
{
    /**
     * Loads the third party JavaScript during Controller->init()
     */
    public function contentcontrollerInit(): void
    {
        if ($jsPath = ChecShortcode::config()->get('javascript_url')) {
            Requirements::javascript($jsPath);
        }
    }

    /**
     * Tries to fetch the inline Chec JS from cache, failing which it gets it from the URL.
     * Should your theme clear requirements, placing this before the closing body tag ensures
     * that it always gets loaded.
     *
     * @return string
     */
    public function getChecJavaScript(): string
    {
        if ($jsPath = ChecShortcode::config()->get('javascript_url')) {
            return sprintf('<script type="text/javascript" src="%s"></script>', $jsPath);
        }
        return '';
    }
}
