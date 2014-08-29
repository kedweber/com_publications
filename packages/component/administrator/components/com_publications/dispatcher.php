<?php

class ComPublicationsDispatcher extends ComDefaultDispatcher
{
    public function _initialize(KConfig $config)
    {
        $config->append(array(
            'controller' => 'publications'
        ));

        parent::_initialize($config);
    }
}