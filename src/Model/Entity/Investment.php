<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Investment Entity
 *
 * @property int $id
 * @property string $symbol
 * @property string $quantity
 * @property string $value
 * @property string $total
 * @property \Cake\I18n\FrozenDate $trade_date
 * @property int $type_id
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Investment extends Entity
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
        'symbol' => true,
        'quantity' => true,
        'value' => true,
        'total' => true,
        'trade_date' => true,
        'type_id' => true,
        'created' => true,
    ];
}
