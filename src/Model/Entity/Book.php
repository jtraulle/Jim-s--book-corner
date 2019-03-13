<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property string|null $summary
 * @property string $language
 * @property int $qty
 *
 * @property \App\Model\Entity\Author $author
 */
class Book extends Entity
{

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
        'title' => true,
        'author_id' => true,
        'summary' => true,
        'language' => true,
        'qty' => true,
        'author' => true
    ];
}
