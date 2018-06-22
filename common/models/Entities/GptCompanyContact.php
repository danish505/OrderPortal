<?php

/**
 * GptCompanyContact
 *
 * @Table(name="gpt_company_contact", indexes={@Index(name="fk_contact_company1_idx", columns={"svc_comp_id"})})
 * @Entity
 */
class GptCompanyContact
{
    /**
     * @var integer
     *
     * @Column(name="cont_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $contId;

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
     * @Column(name="job_title", type="string", length=100, nullable=true)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @Column(name="job_fuction", type="string", length=100, nullable=true)
     */
    private $jobFuction;

    /**
     * @var string
     *
     * @Column(name="job_role", type="string", length=100, nullable=true)
     */
    private $jobRole;

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
     * @var \GptCompany
     *
     * @ManyToOne(targetEntity="GptCompany", inversedBy="contacts")
     * @JoinColumns({
     *   @JoinColumn(name="svc_comp_id", referencedColumnName="svc_comp_id")
     * })
     */
    private $company;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptCompanyContactAddress", mappedBy="contact", cascade={"remove"})
     */
    private $addresses;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptCompanyContactEmail", mappedBy="contact", cascade={"remove"})
     */
    private $emails;

    /**
     * Bidirectional - One-To-Many (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="GptCompanyContactPhone", mappedBy="contact", cascade={"remove"})
     */
    private $phone_numbers;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function setCompany(GptCompany $company) {
        $this->company = $company;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setActive() {
        $this->activeFlg = '1';
    }

    public function isActive(){
        return $this->activeFlg == '1';
    }

    public function getId(){
        return $this->contId;
    }

    public function setId($id){
        $this->contId = $id;
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
        ];
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

    public function setJobTitle($jobTitle){
        $this->jobTitle = $jobTitle;
    }

    public function getJobTitle(){
        return $this->jobTitle;
    }
    
    public function setJobFuction($jobFuction){
        $this->jobFuction = $jobFuction;
    }

    public function getJobFuction(){
        return $this->jobFuction;
    }

    public function setJobRole($jobRole){
        $this->jobRole = $jobRole;
    }

    public function getJobRole(){
        return $this->jobRole;
    }

}
