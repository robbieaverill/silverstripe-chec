<?php

namespace Robbie\SilverstripeChec\Tests;

use Robbie\SilverstripeChec\ChecExtension;
use Robbie\SilverstripeChec\ChecShortcode;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Dev\SapphireTest;

class ChecExtensionTest extends SapphireTest
{
    protected static $fixture_file = 'ChecShortcodeTest.yml';

    /**
     * @var SiteTree&ChecExtension
     */
    private $page;

    protected function setUp()
    {
        parent::setUp();
        $this->page = $this->objFromFixture(SiteTree::class, 'test');
    }

    /**
     * Tests that a non-empty result is returned.
     */
    public function testGetChecJs()
    {
        $result = $this->page->getChecJavaScript();
        $this->assertNotNull($result);
        $this->assertContains('<script type="text/javascript', $result);
    }

    /**
     * Allow the JS to be disabled if desired
     */
    public function testGetChecJsIgnoresIfFalsy()
    {
        ChecShortcode::config()->set('third-party-js', '');
        $result = $this->page->getChecJavaScript();
        $this->assertNotContains('<script type="text/javascript', $result);
    }
}
