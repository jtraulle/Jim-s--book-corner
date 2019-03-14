<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TestimoniesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TestimoniesTable Test Case
 */
class TestimoniesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TestimoniesTable
     */
    public $Testimonies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Testimonies',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Testimonies') ? [] : ['className' => TestimoniesTable::class];
        $this->Testimonies = TableRegistry::getTableLocator()->get('Testimonies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Testimonies);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
