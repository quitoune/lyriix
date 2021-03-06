<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;

/**
 * Songs Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Createurs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Modificateurs
 * @property \App\Model\Table\ArtistSongs&\Cake\ORM\Association\HasMany $ArtistSongs
 * @property \App\Model\Table\FilmSongsTable&\Cake\ORM\Association\HasMany $FilmSongs
 * @property \App\Model\Table\ShowSongsTable&\Cake\ORM\Association\HasMany $ShowSongs
 * @property \App\Model\Table\TranslationsTable&\Cake\ORM\Association\HasMany $Translations
 *
 * @method \App\Model\Entity\Song newEmptyEntity()
 * @method \App\Model\Entity\Song newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Song[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Song get($primaryKey, $options = [])
 * @method \App\Model\Entity\Song findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Song patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Song[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Song|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Song saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Song[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SongsTable extends AppTable
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

        $this->setTable('songs');
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
        $this->hasMany('ArtistSongs', [
            'foreignKey' => 'song_id',
        ]);
        $this->hasMany('FilmSongs', [
            'foreignKey' => 'song_id',
        ]);
        $this->hasMany('ShowSongs', [
            'foreignKey' => 'song_id',
        ]);
        $this->hasMany('Translations', [
            'foreignKey' => 'song_id',
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
            ->scalar('paroles')
            ->requirePresence('paroles', 'create')
            ->notEmptyString('paroles');

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
    
    public function addPost($data)
    {
        $artist_main = (isset($data['artists_main']) ? $data['artists_main'] : array());
        $artist_featuring = (isset($data['artists_featuring']) ? $data['artists_featuring'] : array());
        
        $data['slug'] = $this->createSlug($data['titre']);
        $chanson = $this->findBySlug($data['slug'])->first();
        if(!is_null($chanson)){
            $data['slug'] = $this->createSlug($data['titre'] . "-" . str_replace(",", " ", $data['artists']));
        }
        
        $data['artist_songs'] = array();
        
        foreach ($artist_main as $artist) {
            $data['artist_songs'][] = array(
                'artist_id' => $artist,
                'featuring' => 0
            );
        }
        foreach ($artist_featuring as $artist) {
            $data['artist_songs'][] = array(
                'artist_id' => $artist,
                'featuring' => 1
            );
        }
        
        if($this->save($this->patchEntity($this->newEmptyEntity(), $data))){
            return true;
        }
        return false;
    }
}
