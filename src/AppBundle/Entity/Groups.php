<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/25/2015
 * Time: 9:48 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="groups")
 * @ORM\Entity
 */
class Groups extends BaseEntity {

    /**
     * @ORM\Column(name="group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $groupId;

    /**
     * @ORM\Column(name="group_name", type="string", length=50, unique=true)
     */
    protected $groupName;

    /**
     * @ORM\OneToMany(targetEntity="UserGroup", mappedBy="group")
     */
    protected $userGroup;

    public function __construct()
    {
        $this->userGroup = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @param $groupName
     * @return Groups
     */
    public function setGroupName($groupName)
    {
        $this->groupName = $groupName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * @param $userGroup
     * @return Group
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;

        return $this;
    }
}