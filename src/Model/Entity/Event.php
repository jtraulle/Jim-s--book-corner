<?php
namespace App\Model\Entity;

use App\Utility\BBCodeParser;
use Cake\ORM\Entity;

/**
 * Event Entity
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $location
 * @property \Cake\I18n\FrozenTime $date
 * @property string $description
 * @property int $user_id
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Event extends Entity
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
        'name' => true,
        'subject' => true,
        'location' => true,
        'date' => true,
        'description' => true,
        'user_id' => true,
        'user' => true
    ];

    protected function _getDescription($description)
    {
        return BBCodeParser::htmlToBbcode($description);
    }

    protected function _setDescription($description)
    {
        return BBCodeParser::bbcodeToHtml($description);
    }
}
