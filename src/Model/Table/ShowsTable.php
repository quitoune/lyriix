<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shows Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Createurs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Modificateurs
 * @property \App\Model\Table\ShowSongsTable&\Cake\ORM\Association\HasMany $ShowSongs
 *
 * @method \App\Model\Entity\Show newEmptyEntity()
 * @method \App\Model\Entity\Show newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Show[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Show get($primaryKey, $options = [])
 * @method \App\Model\Entity\Show findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Show patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Show[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Show|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Show saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Show[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ShowsTable extends Table
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

        $this->setTable('shows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Createurs', [
            'className' => 'Users',
            'foreignKey' => 'createur_id',
        ]);
        $this->belongsTo('Modificateurs', [
            'className' => 'Users',
            'foreignKey' => 'modificateur_id',
        ]);
        $this->hasMany('ShowSongs', [
            'foreignKey' => 'show_id',
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
            ->scalar('slug')
            ->maxLength('slug', 255)
            ->requirePresence('slug', 'create')
            ->notEmptyString('slug')
            ->add('slug', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('titre')
            ->maxLength('titre', 255)
            ->requirePresence('titre', 'create')
            ->notEmptyString('titre');

        $validator
            ->integer('annee')
            ->requirePresence('annee', 'create')
            ->notEmptyString('annee');

        $validator
            ->dateTime('creation')
            ->allowEmptyDateTime('creation');

        $validator
            ->dateTime('modification')
            ->allowEmptyDateTime('modification');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['slug']), ['errorField' => 'slug']);
        $rules->add($rules->existsIn(['createur_id'], 'Createurs'), ['errorField' => 'createur_id']);
        $rules->add($rules->existsIn(['modificateur_id'], 'Modificateurs'), ['errorField' => 'modificateur_id']);

        return $rules;
    }
}
