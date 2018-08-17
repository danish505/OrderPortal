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
     * @Column(name="dob", type="string", nullable=false)
     */
    private $dob;

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
     * @OneToMany(targetEntity="GptPatientContact", mappedBy="patient", cascade={"remove"})
     */
    private $contacts;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptPatientFavorite", mappedBy="patient", cascade={"remove"})
     */
    private $favorites;

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

    public function setDOB($dob)
    {
        $date_chunks = explode('-',$dob); //parsing mm-dd-yy 
        $this->dob = "{$date_chunks[2]}-{$date_chunks[0]}-{$date_chunks[1]}"; // convert to yy-mm-dd
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

    public function getDOB()
    {
        $date_chunks = explode('-',$this->dob); //parse 'yy-mm-dd'
        return "{$date_chunks[1]}-{$date_chunks[2]}-{$date_chunks[0]}"; // convert to 'mm-dd-yy'
    }

    public function getContacts(){
        return $this->contacts;
    }

    public function getFavorites(){
        return $this->favorites;
    }

    public function __toString() {
        return $this->getFirstName().' '.$this->getLastName();
    }
}
