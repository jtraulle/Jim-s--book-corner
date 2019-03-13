<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Author Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $full_name
 *
 * @property \App\Model\Entity\Book[] $books
 */
class Author extends Entity
{
    protected $_virtual = ['full_name'];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'books' => true
    ];

    protected function _getFullName()
    {
        return $this->_properties['first_name'] . '  ' .
            $this->_properties['last_name'];
    }
}
