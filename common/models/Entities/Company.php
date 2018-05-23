<?php
/** @Entity
  * @Table(name="company") */
class Company
{
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;

    /** @Column(type="string") */
    private $name;

    /** @Column(type="string") */
    private $owner_name;

    public function __construct()
    {
        //$this->comments = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getOwnerName()
    {
        return $this->owner_name;
    }
}
