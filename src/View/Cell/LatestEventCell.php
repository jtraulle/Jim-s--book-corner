<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LatestEvent cell
 */
class LatestEventCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Events');
        $latestEventAdded = $this->Events->find('all')->order('date desc')->limit(1)->first();
        $this->set(compact('latestEventAdded'));
    }
}
