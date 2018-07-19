<?php

/**
 * GptHospitalDept
 *
 * @Table(name="gpt_hospital_dept", uniqueConstraints={@UniqueConstraint(name="hospital_dept", columns={"hospital_dept_name"})})
 * @Entity
 */
class GptHospitalDept
{
    /**
     * @var integer
     *
     * @Column(name="hospital_dept_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hospitalDeptId;

    /**
     * @var string
     *
     * @Column(name="hospital_dept_name", type="string", length=500, nullable=true)
     */
    private $hospitalDeptName;

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

    
    function getId(){
        return $this->hospitalDeptId;
    } 

    function getDepartmentName(){
        return $this->hospitalDeptName;
    }

    function setDepartmentName($hospitalDeptName){
        $this->hospitalDeptName = $hospitalDeptName;
    }

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function toJson() {
        return [
            'department_id' => $this->hospitalDeptId,
            'department_name' => $this->hospitalDeptName
        ];
    }

    /**
     * Many Departments have Many Hospitals.
     * @ManyToMany(targetEntity="GptHospital")
     * @JoinTable(name="gpt_hospital_dept_xref",
     *      joinColumns={@JoinColumn(name="hospital_dept_id", referencedColumnName="hospital_dept_id")},
     *      inverseJoinColumns={@JoinColumn(name="hospital_id", referencedColumnName="hospital_id")}
     *      )
     */
    private $hospitals;

    public function __construct() {
        $this->hospitals = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getHospitals(){
        return $this->hospitals;
    }

}
