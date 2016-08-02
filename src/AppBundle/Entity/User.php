<?php


namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

class User extends BaseUser
{
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function getIsAdmin(){
    	$roles = $this->getRoles();
    	if(empty($roles)){
    		return true;
    	}
    	return false;
    }
    
    public function setIsAdmin($isAdmin){
    	 if($isAdmin){
    	 	$this->setRoles(array('ROLE_ADMIN'));
    	 }
    }
}