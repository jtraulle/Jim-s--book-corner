<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BooksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BooksTable Test Case
 */
class BooksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BooksTable
     */
    public $Books;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Books',
        'app.Authors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Books') ? [] : ['className' => BooksTable::class];
        $this->Books = TableRegistry::getTableLocator()->get('Books', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Books);

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
