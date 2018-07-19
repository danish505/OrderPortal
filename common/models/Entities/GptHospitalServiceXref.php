<?php

/**
 * GptHospitalServiceXref
 *
 * @Table(name="gpt_hospital_service_xref", uniqueConstraints={@UniqueConstraint(name="service_hospital_unique", columns={"hospital_service_id", "hospital_id", "hospital_dep_id"})}, indexes={@Index(name="fk_hospital_service_xref_service1_idx", columns={"hospital_service_id"}), @Index(name="fk_hospital_service_xref_hospital1_idx", columns={"hospital_id"}), @Index(name="fk_hospital_service_xref_hospital_dept1_idx", columns={"hospital_dep_id"})})
 * @Entity
 */
class GptHospitalServiceXref
{
    /**
     * @var integer
     *
     * @Column(name="hs_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hsId;

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
     * @var \GptHospitalDept
     *
     * @ManyToOne(targetEntity="GptHospitalDept")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_dept_id", referencedColumnName="hospital_dept_id")
     * })
     */
    private $department;

    /**
     * @var \GptHospitalService
     *
     * @ManyToOne(targetEntity="GptHospitalService")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_service_id", referencedColumnName="hospital_service_id")
     * })
     */
    private $service;

    /**
     * @var \GptHospital
     *
     * @ManyToOne(targetEntity="GptHospital")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_id", referencedColumnName="hospital_id")
     * })
     */
    private $hospital;

    public function getService() {
        return $this->service; 
    }

    public function getHospital() {
        return $this->hospital;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function setService($service) {
        $this->service = $service;
    }

    public function setHospital($hospital) {
        $this->hospital = $hospital;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function getId() {
        return $this->hsId;
    }
    
    public function toJson() {
        return [
            'hs_id' => $this->hsId,
            'department_id' => $this->department->getId(),
            'hospital_id' => $this->hospital->getId(),
            'service_id' => $this->service->getId(),
            'service_name' => $this->getServiceName()
        ];
    }
}