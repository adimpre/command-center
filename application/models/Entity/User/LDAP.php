<?php
/**
 * SDIS 62
 *
 * @category   Application
 * @package    Application_Model_Entity_User_LDAP
 */

 /**
 * Class for Profil instance.
 *
 * @category   Application
 * @package    Application_Model_Entity_User_LDAP
 */
class Application_Model_Entity_User_LDAP extends Application_Model_Entity_User implements Application_Model_Entity_User_LDAP_Interface
{
    /**
     * object id in LDAP directory.
     *
     * @var binary
     */
    public $objectid;

    /**
     * The DN object.
     *
     * @var Zend_Ldap_Dn
     */
    public $dn;
    
    /**
     * ID of user
     *
     * @var string
     */
    public $id_user;
    
    /**
     * Get object id.
     *
     * @return binary
     */
    public function getObjectId()
    {
        return $this->objectid;
    }

    /**
     * Get the DN object.
     *
     * @return Zend_Ldap_Dn
     */
    public function getDN()
    {
        return $this->dn;
    }
    
    /**
     * Set the objectid
     *
     * @param  binary $objectid
     * @return Application_Model_Entity_User_LDAP Provides fluent interface
     */
    public function setObjectid($objectid)
    {
        $this->objectid = $objectid;
        return $this;
    }
    
    /**
     * Set the DN object
     *
     * @param  Zend_Ldap_Dn $dn
     * @return Application_Model_Entity_User_LDAP Provides fluent interface
     */
    public function setDN(Zend_Ldap_Dn $dn)
    {
        $this->dn = $dn;
        return $this;
    }
}
