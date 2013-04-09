<?php
/**
 * SDIS 62
 *
 * @category   Application
 * @package    Application_Model_Business_User
 */

 /**
 * Abstract class for user instance.
 *
 * @category   Application
 * @package    Application_Model_Business_User
 */
abstract class Application_Model_Business_User
{
    /**
     * User's profile
     *
     * @var Application_Model_Business_Profile
     */
     protected $profile;
     
    /**
     * If the user still active, the var equal true
     *
     * @var bool
     */
     protected $is_active;
     
     /**
     * List of user's applications
     *
     * @var array<Application_Model_Business_Application>
     */
     protected $applications = array();
     
    /**
     * User's role
     *
     * @var Application_Model_Business_Role
     */
     protected $role;
     
     /**
     * Return true if the user is in SDIS
     *
     * @var bool
     */
     protected $is_in_sdis;
     
     /**
     * Get the user's role
     *
     * @return Application_Model_Business_Role
     */      
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the user's role
     *
     * @param  int $role
     * @return Application_Model_Business_User Provides fluent interface
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
    
     /**
     * Return true if the user is in SDIS
     *
     * @return bool
     */      
    public function isInSDIS()
    {
        return $this->is_in_sdis;
    }

    /**
     * Set the boolean is_in_sdis
     *
     * @param  bool $is_in_sdis
     * @return Application_Model_Business_User Provides fluent interface
     */
    public function setIsInSDIS($is_in_sdis)
    {
        $this->is_in_sdis = $is_in_sdis;
        return $this;
    }

     /**
     * Get the user's profile.
     *
     * @return Application_Model_Business_Profile
     */
     public function getProfile()
     {
        return $this->profile;
     }
     
      /**
     * Get the user's login.
     *
     * @return string
     */
     public function getLogin()
    {
        $profile = $this->getProfile();
    
         if(null === $profile)
        {
            throw new Zend_Exception("User's profile is null.");
        }
        
        return $profile->getEmail();
    }
     
     /**
     * Get the active status
     *
     * @return bool
     */
     public function isActive()
     {
        return $this->is_active;
     }    
     
    /**
     * Set the user's profile
     *
     * @param  Application_Model_Business_Profile $profile
     * @return Application_Model_Business_User Provides fluent interface
     */
    public function setProfile(Application_Model_Business_Profile $profile)
    {
        $this->profile = $profile;
        return $this;
    }
    
    /**
     * Set the user's status (1= active, 0 = inactive)
     *
     * @param  bool $status
     * @return Application_Model_Business_User Provides fluent interface
     */
    public function setActiveStatus($status)
    {
        $this->is_active = $status;
        return $this;
    }
    
    /**
     * Get an array with user's applications.
     *
     * @return array<Application_Model_Business_Application>
     */      
    public function getApplications()
    {
        return $this->applications;
    }

    /**
     * Set the array of user's applications.
     *
     * @param  array<Application_Model_Business_Application> $applications
     * @return Application_Model_Business_User Provides fluent interface
     */
    public function setApplications(array $applications)
    {
        $this->applications = $applications;
        return $this;
    }
 
    /**
     * Add an application in the array of user's applications.
     *
     * @param  Application_Model_Business_Application $application
     * @return Application_Model_Business_User Provides fluent interface
     */ 
    public function addApplication(Application_Model_Business_Application $application)
    {
        // avoid duplication
        if(false !== array_search($application, $this->applications))
        {
            return $this;
        }
        
        array_push($this->applications, $application);
        
        return $this;
    }
    
    /**
     * Add a collection of applications in the array of user's applications.
     *
     * @param  array<Application_Model_Business_Application>|Application_Model_Business_ApplicationsGroup $applications
     * @return Application_Model_Business_User Provides fluent interface
     */ 
    public function addApplications($applications)
    {
        if(is_array($applications))
        {
            foreach($applications as $application)
            { 
                $this->addApplication($application);
            }
        }
        else if($applications instanceof Application_Model_Business_ApplicationsGroup)
        {
            $this->addApplications($applications->getApplications());
        }
        
        return $this;
    }
    
    /**
     * Remove an application in the array of user's applications.
     *
     * @param  Application_Model_Business_Application $application
     * @return Application_Model_Business_User Provides fluent interface
     */ 
    public function removeApplication(Application_Model_Business_Application $application)
    {
        // Serach application in user's applications array
        $key_of_application_to_remove = array_search($application, $this->applications);

        if($key_of_application_to_remove === false)
        {
            return $this;
        }
        
        unset($this->applications[$key_of_application_to_remove]);
    
        return $this;
    }
    
    /**
     * Test if the user has the application
     *
     * @param  Application_Model_Business_Application $application
     * @return bool True if the user has the application, else false
     */
    public function hasApplication($application)
    {
        return in_array($application, $this->getApplications());
    }
}