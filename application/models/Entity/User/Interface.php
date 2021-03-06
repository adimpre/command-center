<?php
/**
 * SDIS 62
 *
 * @category   Application
 * @package    Application_Model_Entity_User_Interface
 */

 /**
 * Interface for user instance.
 *
 * @category   Application
 * @package    Application_Model_Entity_User_Interface
 */
interface Application_Model_Entity_User_Interface
{
     /**
     * Construct the user with a profile
     *
     * @param  Application_Model_Proxy_Profile $profile
      * @return Application_Model_Entity_User
     */
     public function __construct(Application_Model_Proxy_Profile $profile = null);
     
     /**
     * Get the user's role
     *
     * @return Application_Model_Entity_Role
     */      
    public function getRole();

    /**
     * Set the user's role
     *
     * @param  int $role
     * @return Application_Model_Entity_User Provides fluent interface
     */
    public function setRole($role);

     /**
     * Get the user's profile.
     *
     * @return Application_Model_Proxy_Profile
     */
     public function getProfile();
     
      /**
     * Get the user's login.
     *
     * @return string
     */
     public function getLogin();
     
     /**
     * Get the active status
     *
     * @return bool
     */
     public function isActive();   
     
    /**
     * Set the user's profile
     *
     * @param  Application_Model_Proxy_Profile $profile
     * @return Application_Model_Entity_User Provides fluent interface
     */
    public function setProfile(Application_Model_Proxy_Profile $profile);
    
    /**
     * Set the user's status (1= active, 0 = inactive)
     *
     * @param  bool $status
     * @return Application_Model_Entity_User Provides fluent interface
     */
    public function setActiveStatus($status);
    
    /**
     * Get an array with user's applications.
     *
     * @return array<Application_Model_Proxy_Application>
     */      
    public function getApplications();

    /**
     * Set the array of user's applications.
     *
     * @param  array<Application_Model_Proxy_Application> $applications
     * @return Application_Model_Entity_User Provides fluent interface
     */
    public function setApplications(array $applications);
 
    /**
     * Add an application in the array of user's applications.
     *
     * @param  Application_Model_Proxy_Application $application
     * @return Application_Model_Entity_User Provides fluent interface
     */ 
    public function addApplication(Application_Model_Proxy_Application $application);
    
    /**
     * Add a collection of applications in the array of user's applications.
     *
     * @param  array<Application_Model_Proxy_Application>|Application_Model_Proxy_ApplicationsGroup $applications
     * @return Application_Model_Entity_User Provides fluent interface
     */ 
    public function addApplications($applications);
    
    /**
     * Remove an application in the array of user's applications.
     *
     * @param  Application_Model_Proxy_Application $application
     * @return Application_Model_Entity_User Provides fluent interface
     */ 
    public function removeApplication(Application_Model_Proxy_Application $application);
    
    /**
     * Test if the user has the application
     *
     * @param  Application_Model_Proxy_Application $application
     * @return bool True if the user has the application, else false
     */
    public function hasApplication($application);
    
    /**
     * Retrieve the user's informations in an array
     *
     * @return array
     */     
    public function toArray();
}
