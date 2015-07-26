<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/25/2015
 * Time: 10:02 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user_group")
 * @ORM\Entity
 */
class UserGroup extends BaseEntity {

    /**
     * @ORM\Column(name="user_group_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $userGroupId;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="userGroup")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     **/
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Groups", inversedBy="userGroup")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="group_id")
     **/
    protected $group;

    /**
     * @return mixed
     */
    public function getUserGroupId()
    {
        return $this->userGroupId;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param $user
     * @return UserGroup
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param $group
     * @return UserGroup
     */
    public function setGroup(Groups $group)
    {
        $this->group = $group;

        return $this;
    }
}