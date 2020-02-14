<?php

namespace Robbie\SilverstripeChec\Tests;

use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Dev\FunctionalTest;
use SilverStripe\View\Parsers\ShortcodeParser;

class ChecShortcodeTest extends FunctionalTest
{
    protected static $fixture_file = 'ChecIOShortcodeTest.yml';

    /**
     * @var SiteTree
     */
    private $page;

    protected function setUp()
    {
        parent::setUp();
        $this->page = $this->objFromFixture(SiteTree::class, 'test');
    }

    /**
     * Tests that the shortcode gets parsed
     */
    public function testBuyNowButton()
    {
        $text = $this->page->Content;
        $parsed = ShortcodeParser::get_active()->parse($text);
        $this->assertContains('<a href="https://checkout.chec.io/1', $parsed);
        $this->assertContains('">Buy Now', $parsed);
    }
}
