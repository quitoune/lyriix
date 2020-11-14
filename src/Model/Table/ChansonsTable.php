<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chansons Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Createurs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Modificateurs
 * @property \App\Model\Table\ChansonFilmsTable&\Cake\ORM\Association\HasMany $ChansonFilms
 * @property \App\Model\Table\ChansonShowsTable&\Cake\ORM\Association\HasMany $ChansonShows
 * @property \App\Model\Table\TraductionsTable&\Cake\ORM\Association\HasMany $Traductions
 *
 * @method \App\Model\Entity\Chanson newEmptyEntity()
 * @method \App\Model\Entity\Chanson newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chanson[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chanson get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chanson findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chanson patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chanson[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chanson|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chanson saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chanson[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chanson[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chanson[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chanson[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChansonsTable extends Table
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

        $this->setTable('chansons');
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
        $this->hasMany('ChansonFilms', [
            'foreignKey' => 'chanson_id',
        ]);
        $this->hasMany('ChansonShows', [
            'foreignKey' => 'chanson_id',
        ]);
        $this->hasMany('Traductions', [
            'foreignKey' => 'chanson_id',
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
            ->scalar('interprete')
            ->maxLength('interprete', 255)
            ->allowEmptyString('interprete');

        $validator
            ->integer('annee')
            ->requirePresence('annee', 'create')
            ->notEmptyString('annee');

        $validator
            ->scalar('paroles')
            ->maxLength('paroles', 255)
            ->allowEmptyString('paroles');

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
