<?php
/**
 * SDIS 62
 *
 * @category   Application
 * @package    Application_Model_Entity_Profile_Elu_Maire
 */

 /**
 * Abstract class for Profil instance.
 *
 * @category   Application
 * @package    Application_Model_Entity_Profile_Elu_Maire
 */
class Application_Model_Entity_Profile_Elu_Maire extends Application_Model_Entity_Profile_Elu implements Application_Model_Entity_Profile_Elu_Maire_Interface
{
    /**
     * City.
     *
     * @var string
     */
    public $city;
    
    /**
     * ID of profileelu
     *
     * @var string
     */
	public $id_profileelu;

    /**
     * Get the mayor's city
     *
     * @return string
     */    
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the city
     *
     * @param  string $city
     * @return Application_Model_Entity_Profile_Elu_Maire Provides fluent interface
     */    
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }
}
