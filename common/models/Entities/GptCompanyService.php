<?php

/**
 * GptCompanyService
 *
 * @Table(name="gpt_company_service", indexes={@Index(name="fk_service_company_idx", columns={"svc_comp_id"})})
 * @Entity
 */
class GptCompanyService
{
    /**
     * @var integer
     *
     * @Column(name="service_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $serviceId;

    /**
     * @var string
     *
     * @Column(name="service_name", type="string", length=100, nullable=true)
     */
    private $serviceName;

    /**
     * @var string
     *
     * @Column(name="service_category", type="string", length=100, nullable=true)
     */
    private $serviceCategory;

    /**
     * @var string
     *
     * @Column(name="service_sub_category", type="string", length=100, nullable=true)
     */
    private $serviceSubCategory;

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
     * @ManyToOne(targetEntity="GptCompany", inversedBy="services")
     * @JoinColumns({
     *   @JoinColumn(name="svc_comp_id", referencedColumnName="svc_comp_id")
     * })
     */
    private $company;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function getId() {
        return $this->serviceId;
    }

    public function getServiceName() {
        return $this->serviceName;
    }

    public function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }
    
    public function getCategory() {
        return $this->serviceCategory;
    }

    public function setCategory($serviceCategory) {
        $this->serviceCategory = $serviceCategory;
    }
    
    public function getSubCategory(){
        return $this->serviceSubCategory;
    }

    public function setSubCategory($serviceSubCategory){
        $this->serviceSubCategory = $serviceSubCategory;
    }

    public function setActive() {
        $this->activeFlg = '1';
    }

    public function isActive(){
        return $this->activeFlg == '1';
    }

    public function setCompany(GptCompany $company) {
        $this->company = $company;
    }

    public function getCompany() {
        return $this->company;
    }

    public function toJson() {
        return [
            'service_provider_id' => $this->getCompany()->getId(),
            'service_id' => $this->serviceId,
            'service_name' => $this->serviceName,
            'service_category' => $this->serviceCategory,
            'service_sub_category' => $this->serviceSubCategory
        ];
    }
}
