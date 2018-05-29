<?php

/**
 * GptHospitalContXref
 *
 * @Table(name="gpt_hospital_cont_xref", uniqueConstraints={@UniqueConstraint(name="contact_hospital_unique", columns={"cont_id", "hospital_id", "hospital_dep_id"})}, indexes={@Index(name="fk_hospital_cont_xref_contact1_idx", columns={"cont_id"}), @Index(name="fk_hospital_cont_xref_hospital1_idx", columns={"hospital_id"}), @Index(name="fk_hospital_cont_xref_hospital_dept1_idx", columns={"hospital_dep_id"})})
 * @Entity
 */
class GptHospitalContXref
{
    /**
     * @var integer
     *
     * @Column(name="hc_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hcId;

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
     * @var \GptHospitalContact
     *
     * @ManyToOne(targetEntity="GptHospitalContact")
     * @JoinColumns({
     *   @JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $cont;

    /**
     * @var \GptHospital
     *
     * @ManyToOne(targetEntity="GptHospital")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_id", referencedColumnName="hospital_id")
     * })
     */
    private $hospital;

    /**
     * @var \GptHospitalDept
     *
     * @ManyToOne(targetEntity="GptHospitalDept")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_dep_id", referencedColumnName="hospital_dept_id")
     * })
     */
    private $hospitalDep;
}
