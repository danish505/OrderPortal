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
    
    public function getServiceCategory() {
        return $this->serviceCategory;
    }

    public function setServiceCategory($serviceCategory) {
        $this->serviceCategory = $serviceCategory;
    }
    
    public function getServiceSubCategory(){
        return $this->serviceSubCategory;
    }

    public function setServiceSubCategory($serviceSubCategory){
        $this->serviceSubCategory = $serviceSubCategory;
    }

    public function setActive() {
        $this->activeFlg = '1';
    }

    public function isActive(){
        return $this->activeFlg == '1';
    }
}
