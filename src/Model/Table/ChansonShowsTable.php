<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ChansonShows Model
 *
 * @property \App\Model\Table\ChansonsTable&\Cake\ORM\Association\BelongsTo $Chansons
 * @property \App\Model\Table\ShowsTable&\Cake\ORM\Association\BelongsTo $Shows
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Createurs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Modificateurs
 *
 * @method \App\Model\Entity\ChansonShow newEmptyEntity()
 * @method \App\Model\Entity\ChansonShow newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ChansonShow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ChansonShow get($primaryKey, $options = [])
 * @method \App\Model\Entity\ChansonShow findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ChansonShow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ChansonShow[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ChansonShow|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChansonShow saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ChansonShow[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChansonShow[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChansonShow[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ChansonShow[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChansonShowsTable extends Table
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

        $this->setTable('chanson_shows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Chansons', [
            'foreignKey' => 'chanson_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Shows', [
            'foreignKey' => 'show_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Createurs', [
            'className' => 'Users',
            'foreignKey' => 'createur_id',
        ]);
        $this->belongsTo('Modificateurs', [
            'className' => 'Users',
            'foreignKey' => 'modificateur_id',
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
            ->scalar('episode')
            ->maxLength('episode', 10)
            ->requirePresence('episode', 'create')
            ->notEmptyString('episode');

        $validator
            ->scalar('scene')
            ->maxLength('scene', 255)
            ->allowEmptyString('scene');

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
        $rules->add($rules->existsIn(['chanson_id'], 'Chansons'), ['errorField' => 'chanson_id']);
        $rules->add($rules->existsIn(['show_id'], 'Shows'), ['errorField' => 'show_id']);
        $rules->add($rules->existsIn(['createur_id'], 'Createurs'), ['errorField' => 'createur_id']);
        $rules->add($rules->existsIn(['modificateur_id'], 'Modificateurs'), ['errorField' => 'modificateur_id']);

        return $rules;
    }
}
