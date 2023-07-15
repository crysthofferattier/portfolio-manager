<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * InvestmentsType Model
 *
 * @method \App\Model\Entity\InvestmentsType newEmptyEntity()
 * @method \App\Model\Entity\InvestmentsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\InvestmentsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\InvestmentsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\InvestmentsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\InvestmentsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\InvestmentsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\InvestmentsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvestmentsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\InvestmentsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvestmentsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvestmentsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\InvestmentsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InvestmentsTypeTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('investments_type');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasOne('Investments')->setProperty('symbol');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('symbol')
            ->maxLength('symbol', 10)
            ->requirePresence('symbol', 'create')
            ->notEmptyString('symbol');

        return $validator;
    }
}
