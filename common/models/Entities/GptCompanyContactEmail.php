<?php

/**
 * GptCompanyContactEmail
 *
 * @Table(name="gpt_company_contact_email", indexes={@Index(name="fk_email_contact1_idx", columns={"cont_id"})})
 * @Entity
 */
class GptCompanyContactEmail
{
    /**
     * @var integer
     *
     * @Column(name="email_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

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
     * @var \GptCompanyContact
     *
     * @ManyToOne(targetEntity="GptCompanyContact", inversedBy="emails")
     * @JoinColumns({
     *   @JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $contact;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function setPrimary() {
        $this->primaryFlg = '1';
    }

    public function isPrimary(){
        return $this->primaryFlg == '1';
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setContact($contact) {
        $this->contact = $contact;
    }
    
    public function getContact(){
        return $this->contact;
    }

    public function getId(){
        return $this->emailId;
    }

    public function setId($id){
        $this->emailId = $id;
    }

    public function __toString(){
        return $this->email;
    }

    public function toJson(){
        return [
            'email_id' => $this->emailId,
            'contact_id' => $this->contact->getId(),
            'service_provider_id' => $this->getContact()->getCompany()->getId(),
            'email' => $this->email,
        ];
    }
}
