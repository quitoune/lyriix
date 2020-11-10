<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 * @property \App\Model\Table\UtilisateursTable&\Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \App\Model\Table\UtilisateursTable&\Cake\ORM\Association\BelongsTo $Utilisateurs
 * @property \App\Model\Table\ChansonFilmsTable&\Cake\ORM\Association\HasMany $ChansonFilms
 *
 * @method \App\Model\Entity\Film newEmptyEntity()
 * @method \App\Model\Entity\Film newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Film[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Film get($primaryKey, $options = [])
 * @method \App\Model\Entity\Film findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Film patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Film[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Film|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Film[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FilmsTable extends Table
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

        $this->setTable('films');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->belongsTo('Createurs', [
            'className' => 'Utilisateurs',
            'foreignKey' => 'createur_id',
        ]);
        $this->belongsTo('Modificateurs', [
            'className' => 'Utilisateurs',
            'foreignKey' => 'modificateur_id',
        ]);
        $this->hasMany('ChansonFilms', [
            'foreignKey' => 'film_id',
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
            ->scalar('realisateur')
            ->maxLength('realisateur', 255)
            ->requirePresence('realisateur', 'create')
            ->notEmptyString('realisateur');

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
        $rules->add($rules->existsIn(['createur_id'], 'Utilisateurs'), ['errorField' => 'createur_id']);
        $rules->add($rules->existsIn(['modificateur_id'], 'Utilisateurs'), ['errorField' => 'modificateur_id']);

        return $rules;
    }
}
