<?php

class Api_Model_Row_Token extends Zend_Db_Table_Row_Abstract
{ 
    public function getUser()
    {
        return $this->findApplication_Model_UsersViaApi_Model_TokensUser()->current();
    }
}