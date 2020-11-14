<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Traductions Model
 *
 * @property \App\Model\Table\ChansonsTable&\Cake\ORM\Association\BelongsTo $Chansons
 * @property \App\Model\Table\LanguesTable&\Cake\ORM\Association\BelongsTo $Langues
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Createurs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Modificateurs
 *
 * @method \App\Model\Entity\Traduction newEmptyEntity()
 * @method \App\Model\Entity\Traduction newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Traduction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Traduction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Traduction findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Traduction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Traduction[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Traduction|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Traduction saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Traduction[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TraductionsTable extends Table
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

        $this->setTable('traductions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Chansons', [
            'foreignKey' => 'chanson_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Langues', [
            'foreignKey' => 'langue_id',
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
            ->scalar('texte')
            ->maxLength('texte', 255)
            ->requirePresence('texte', 'create')
            ->notEmptyString('texte');

        $validator
            ->scalar('auteur')
            ->maxLength('auteur', 255)
            ->allowEmptyString('auteur');

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
        $rules->add($rules->existsIn(['langue_id'], 'Langues'), ['errorField' => 'langue_id']);
        $rules->add($rules->existsIn(['createur_id'], 'Createurs'), ['errorField' => 'createur_id']);
        $rules->add($rules->existsIn(['modificateur_id'], 'Modificateurs'), ['errorField' => 'modificateur_id']);

        return $rules;
    }
}
