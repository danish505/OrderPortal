<?php

/**
 * GptCompany
 *
 * @Table(name="gpt_company")
 * @Entity
 */
class GptCompany
{
    /**
     * @var integer
     *
     * @Column(name="svc_comp_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $svcCompId;

    /**
     * @var string
     *
     * @Column(name="company_name", type="string", length=100, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     *
     * @Column(name="company_Type", type="string", length=100, nullable=true)
     */
    private $companyType;

    /**
     * @var string
     *
     * @Column(name="company_url", type="string", length=1000, nullable=true)
     */
    private $companyUrl;

    /**
     * @var boolean
     *
     * @Column(name="active_flg", type="boolean", nullable=false)
     */
    private $activeFlg = '1';

    /**
     * @var \DateTime
     *
     * @Column(name="last_verified_dt", type="datetime", nullable=true)
     */
    private $lastVerifiedDt;

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
     * @OneToMany(targetEntity="GptCompanyContact", mappedBy="company", cascade={"remove"})
     */
    private $contacts;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function getId() {
        return $this->svcCompId;
    }

    public function getCompanyName() {
        return $this->companyName;
    }

    public function getCompanyType() {
        return $this->companyType;
    }

    public function getCompanyUrl() {
        return $this->companyUrl;
    }

    public function getContacts(){
        return $this->contacts;
    }

    public function setCompanyName($companyName) {
        $this->companyName = $companyName;
    }

    public function setCompanyType($companyType) {
        $this->companyType = $companyType;
    }

    public function setCompanyUrl($companyUrl) {
        $this->companyUrl = $companyUrl;
    }

    public function toJson() {
        return [
            'service_provider_id' => $this->svcCompId,
            'service_provider_name' => $this->companyName,
            'service_provider_type' => $this->companyType,
            'service_provider_url' => $this->companyUrl
        ];
    }
}
