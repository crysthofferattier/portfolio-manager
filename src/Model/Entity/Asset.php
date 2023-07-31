<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Asset Entity
 *
 * @property int $id
 * @property string $symbol
 * @property string $name
 * @property int $asset_type_id
 * @property \Cake\I18n\FrozenTime|null $created
 *
 * @property \App\Model\Entity\Asset[] $assets
 * @property \App\Model\Entity\Dividend[] $dividends
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Asset extends Entity
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
        'name' => true,
        'asset_type_id' => true,
        'created' => true,
        'assets' => true,
        'dividends' => true,
        'transactions' => true,
    ];
}
