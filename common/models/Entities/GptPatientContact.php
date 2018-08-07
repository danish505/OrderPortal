<?php

/**
 * GptPatientContact
 *
 * @Table(name="gpt_patient_contact", indexes={@Index(name="fk_patient_id_idx", columns={"patient_id"})})
 * @Entity
 */
class GptPatientContact
{
    /**
     * @var integer
     *
     * @Column(name="patient_cont_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $patientContId;

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
     * @Column(name="relation", type="string", length=50, nullable=true)
     */
    private $relation;

    /**
     * @var boolean
     *
     * @Column(name="primary_flg", type="boolean", nullable=true)
     */
    private $primaryFlg = '0';

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
     * @var \GptPatient
     *
     * @ManyToOne(targetEntity="GptPatient", inversedBy="contacts")
     * @JoinColumns({
     *   @JoinColumn(name="patient_id", referencedColumnName="patient_id")
     * })
     */
    private $patient;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptPatientContactAddress", mappedBy="contact", cascade={"remove"})
     */
    private $addresses;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptPatientContactEmail", mappedBy="contact", cascade={"remove"})
     */
    private $emails;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptPatientContactPhone", mappedBy="contact", cascade={"remove"})
     */
    private $phone_numbers;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function getSalutation(){
        return $this->salutation;
    }

    public function setSalutation($salutation) {
        $this->salutation = $salutation;
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

    public function getRelation()
    {
        return $this->relation;
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

    public function setRelation($relation)
    {
        $this->relation = $relation;
    }

    public function getDisplayName()
    {
        return $this->getFirstName().' '.$this->getLastName() . ' ( '.$this->getRelation().' )';
    }

    public function setPatient(GptPatient $patient) {
        $this->patient = $patient;
    }

    public function getPatient() {
        return $this->patient;
    }

    public function setPrimary() {
        $this->primaryFlg = '1';
    }

    public function isPrimary(){
        return $this->primaryFlg == '1';
    }

    public function getId(){
        return $this->patientContId;
    }

    public function setId($id){
        $this->patientContId = $id;
    }

    public function getAddresses(){
        return $this->addresses;
    }

    public function getEmails(){
        return $this->emails;
    }

    public function getPhoneNumbers(){
        return $this->phone_numbers;
    }

    public function __toString(){
        return $this->getFirstName().' '.$this->getLastName();
    }

    public function toJson() {
        return [
            'id' => $this->getId(),
            'patient_id' => $this->patient->getId(),
            'salutation' => $this->getSalutation(),
            'first_name' => $this->getFirstName(),
            'middle_name' => $this->getMiddleName(),
            'last_name' => $this->getLastName(),
            'relation' => $this->getRelation(),
        ];
    }
}
