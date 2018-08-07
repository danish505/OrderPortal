<?php

/**
 * GptHospital
 *
 * @Table(name="gpt_hospital")
 * @Entity
 */
class GptHospital
{
    /**
     * @var integer
     *
     * @Column(name="hospital_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hospitalId;

    /**
     * @var string
     *
     * @Column(name="hospital_name", type="string", length=100, nullable=true)
     */
    private $hospitalName;

    /**
     * @var string
     *
     * @Column(name="hospital_type", type="string", length=100, nullable=true)
     */
    private $hospitalType;

    /**
     * @var string
     *
     * @Column(name="hospital_url", type="string", length=1000, nullable=true)
     */
    private $hospitalUrl;

    /**
     * @var boolean
     *
     * @Column(name="in_contract", type="boolean", nullable=false)
     */
    private $inContract = '0';

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

    public function getId(){
        return $this->hospitalId;
    }

    public function getHospitalName(){
        return $this->hospitalName;
    }

    public function setHospitalName($hospitalName){
        $this->hospitalName = $hospitalName;
    }

    public function getHospitalType() {
        return $this->hospitalType;
    }
    
    public function setHospitalType($hospitalType) {
        $this->hospitalType = $hospitalType;
    }

    public function getHospitalUrl() {
        return $this->hospitalUrl;
    }

    public function setHospitalUrl($hospitalUrl) {
        $this->hospitalUrl = $hospitalUrl;
    }

    public function setInContract($inContract) {
        $this->inContract = $inContract;
    }

    public function getInContract() {
        return $this->inContract;
    }

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function toJson() {
        return [
            'hospital_id' => $this->hospitalId,
            'hospital_name' => $this->hospitalName,
            'hospital_type' => $this->hospitalType,
            'hospital_url' => $this->hospitalUrl,
            'in_contract' => (int) $this->inContract
        ];
    }

    // ...

    /**
     * Many Hospitals have Many Groups.
     * @ManyToMany(targetEntity="GptHospitalDept")
     * @JoinTable(name="gpt_hospital_dept_xref",
     *      joinColumns={@JoinColumn(name="hospital_id", referencedColumnName="hospital_id")},
     *      inverseJoinColumns={@JoinColumn(name="hospital_dept_id", referencedColumnName="hospital_dept_id")}
     *      )
     */
    private $departments;

    public function __construct() {
        $this->departments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->affiliates = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function addDepartment($department){
        $this->departments[] = $department;
    }

    public function getDepartments(){
        return $this->departments;
    }

    /**
     * Many Hospitals have Many Hospitals as affiliates.
     * @ManyToMany(targetEntity="GptHospital")
     * @JoinTable(name="gpt_hospital_affiliate_xref",
     *      joinColumns={@JoinColumn(name="hospital_id", referencedColumnName="hospital_id")},
     *      inverseJoinColumns={@JoinColumn(name="affiliate_hospital_id", referencedColumnName="hospital_id")}
     *      )
     */
    private $affiliates;

    public function addAffiliate($hospital){
        $this->affiliates[] = $hospital;
    }

    public function getAffiliates(){
        return $this->affiliates;
    }

}
