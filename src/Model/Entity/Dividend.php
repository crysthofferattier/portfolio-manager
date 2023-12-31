<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dividend Entity
 *
 * @property int $id
 * @property int $asset_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $date
 * @property int|null $share
 * @property string $value
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Asset $asset
 */
class Dividend extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'asset_id' => true,
        'user_id' => true,
        'date' => true,
        'share' => true,
        'value' => true,
        'created' => true,
        'asset' => true,
    ];
}
