<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\BBCodeParser;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\BBCodeParserComponent Test Case
 */
class BBCodeParserComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\BBCodeParser
     */
    public $BBCodeParser;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->BBCodeParser = new BBCodeParser($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BBCodeParser);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
