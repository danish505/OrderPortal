<?php

/**
 * GptPatient
 *
 * @Table(name="gpt_patient")
 * @Entity
 */
class GptPatient
{
    /**
     * @var integer
     *
     * @Column(name="patient_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $patientId;

    /**
     * @var string
     *
     * @Column(name="salutation", type="string", length=100, nullable=true)
     */
    private $salutation;

    /**
     * @var string
     *
     * @Column(name="first_name", type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Column(name="middle_name", type="string", length=100, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var integer
     *
     * @Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var boolean
     *
     * @Column(name="active_flg", type="boolean", nullable=false)
     */
    private $activeFlg = '1';

    /**
     * @var \DateTime
     *
     * @Column(name="create_ts", type="datetime", nullable=false)
     */
    private $createTs = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @Column(name="update_ts", type="datetime", nullable=false)
     */
    private $updateTs = 'CURRENT_TIMESTAMP';

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptPatientContact", mappedBy="patient")
     */
    private $contacts;

    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    public function getDisplayName()
    {
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getId()
    {
        return $this->patientId;
    }

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function getSalutation()
    {
        return $this->salutation;
    }

    public function getFirstName()
    {
        return $this->firstName ;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getMiddleName()
    {
        return $this->middleName;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getContacts(){
        return $this->contacts;
    }
}
