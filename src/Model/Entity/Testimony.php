<?php
namespace App\Model\Entity;

use App\Utility\BBCodeParser;
use Cake\ORM\Entity;

/**
 * Testimony Entity
 *
 * @property int $id
 * @property string $testimony
 * @property \Cake\I18n\FrozenTime $date
 * @property int $user_id
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Testimony extends Entity
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
        'testimony' => true,
        'date' => true,
        'user_id' => true,
        'user' => true
    ];

    protected function _getTestimony($description)
    {
        return BBCodeParser::htmlToBbcode($description);
    }

    protected function _setTestimony($description)
    {
        return BBCodeParser::bbcodeToHtml($description);
    }
}
