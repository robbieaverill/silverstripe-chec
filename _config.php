<?php

use Robbie\SilverstripeChec\ChecShortcode;
use SilverStripe\View\Parsers\ShortcodeParser;

ShortcodeParser::get('default')
    ->register('BuyNowButton', [ChecShortcode::class, 'getBuyNowButton']);
