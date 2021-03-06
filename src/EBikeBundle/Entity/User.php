<?php
/**
 * Created by PhpStorm.
 * User: gabrielsamoma
 * Date: 3/24/16
 * Time: 2:53 PM
 */
// src/AppBundle/Entity/User.php

namespace EBikeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
