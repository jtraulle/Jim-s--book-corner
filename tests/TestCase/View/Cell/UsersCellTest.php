<?php
namespace App\Test\TestCase\View\Cell;

use App\View\Cell\UsersCell;
use Cake\TestSuite\TestCase;

/**
 * App\View\Cell\UsersCell Test Case
 */
class UsersCellTest extends TestCase
{

    /**
     * Request mock
     *
     * @var \Cake\Http\ServerRequest|\PHPUnit_Framework_MockObject_MockObject
     */
    public $request;

    /**
     * Response mock
     *
     * @var \Cake\Http\Response|\PHPUnit_Framework_MockObject_MockObject
     */
    public $response;

    /**
     * Test subject
     *
     * @var \App\View\Cell\UsersCell
     */
    public $Users;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = $this->getMockBuilder('Cake\Http\ServerRequest')->getMock();
        $this->response = $this->getMockBuilder('Cake\Http\Response')->getMock();
        $this->Users = new UsersCell($this->request, $this->response);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

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
     * Test display method
     *
     * @return void
     */
    public function testDisplay()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
