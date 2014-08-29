<?php

class ComPublicationsModelPublications extends ComDefaultModelDefault
{
    public function _buildQueryWhere(KDatabaseQuery $query)
    {
        parent::_buildQueryWhere($query);

        $state = $this->_state;

        if($state->search)
        {
            $query->where('tbl.title', 'LIKE', '%' . $state->search . '%');
        }
    }
}