<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaction Entity
 *
 * @property int $id
 * @property int $asset_id
 * @property string $quantity
 * @property string $value
 * @property string $total
 * @property \Cake\I18n\FrozenDate $trade_date
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Asset $asset
 */
class Transaction extends Entity
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
        'quantity' => true,
        'value' => true,
        'total' => true,
        'trade_date' => true,
        'created' => true,
        'asset' => true,
    ];
}
