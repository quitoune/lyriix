<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Langues Model
 *
 * @property \App\Model\Table\TraductionsTable&\Cake\ORM\Association\HasMany $Traductions
 *
 * @method \App\Model\Entity\Langue newEmptyEntity()
 * @method \App\Model\Entity\Langue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Langue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Langue get($primaryKey, $options = [])
 * @method \App\Model\Entity\Langue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Langue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Langue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Langue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Langue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Langue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Langue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Langue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Langue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LanguesTable extends Table
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

        $this->setTable('langues');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Traductions', [
            'foreignKey' => 'langue_id',
        ]);
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('code')
            ->maxLength('code', 10)
            ->requirePresence('code', 'create')
            ->notEmptyString('code');

        $validator
            ->scalar('nom')
            ->maxLength('nom', 100)
            ->requirePresence('nom', 'create')
            ->notEmptyString('nom');

        return $validator;
    }
}
