<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * LatestBooksAdded cell
 */
class LatestBooksAddedCell extends Cell
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
        $this->loadModel('Books');
        $latestBooksAdded = $this->Books->find('all')->contain('Authors')->order('Books.id desc')->limit(8);
        $this->set(compact('latestBooksAdded'));
    }
}
