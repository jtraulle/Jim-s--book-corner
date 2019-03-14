<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Users cell
 */
class UsersCell extends Cell
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
    public function donorsList()
    {
        $this->loadModel('Users');
        $donorsList = $this->Users->find('all')
                                  ->select(['first_name', 'last_name'])
                                  ->where(['nbLivresDonnes >=' => 1])
                                  ->order('last_name asc, first_name asc');
        $this->set(compact('donorsList'));
    }
}
