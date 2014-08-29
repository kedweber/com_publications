<?php

class ComPublicationsDatabaseTablePublications extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $relationable = $this->getBehavior('com://admin/taxonomy.database.behavior.relationable',
            array(
                'ancestors' => array(
                    'articles' => array(
                        'identifier' => 'com://admin/articles.model.articles',
                    )
                )
            )
        );

        $config->append(array(
            'behaviors' => array(
                'lockable',
                'com://admin/moyo.database.behavior.creatable',
                'modifiable',
                'identifiable',
                'orderable',
                'sluggable',
                'com://admin/cck.database.behavior.elementable',
                $relationable,
                'com://admin/translations.database.behavior.translatable',
                'com://admin/kutafuta.database.behavior.searchable',
            )
        ));

        parent::_initialize($config);
    }
}