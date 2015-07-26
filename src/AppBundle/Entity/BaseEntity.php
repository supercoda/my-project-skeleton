<?php
/**
 * Created by PhpStorm.
 * User: Andre
 * Date: 6/24/2015
 * Time: 9:16 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 * @ORM\HasLifecycleCallbacks
 */
abstract class BaseEntity {

    /**
     * @var date $createdDate
     *
     * @ORM\Column(name="created_date", type="datetime")
     */
    private $createdDate;

    /**
     * @var date $lastUpdatedDate
     *
     * @ORM\Column(name="last_updated_date", type="datetime")
     */
    private $lastUpdatedDate;

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->lastUpdatedDate = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        $this->createdDate = new \DateTime();
        $this->lastUpdatedDate = new \DateTime();
    }
}