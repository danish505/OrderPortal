<?php

/**
 * GptHospitalDeptXref
 *
 * @Table(name="gpt_hospital_dept_xref", uniqueConstraints={@UniqueConstraint(name="hd_uq_id", columns={"hospital_dept_id", "hospital_id"})}, indexes={@Index(name="fk_hospital_dept_xref_hospital1_idx", columns={"hospital_id"}), @Index(name="IDX_6D402359CC9E83BC", columns={"hospital_dept_id"})})
 * @Entity
 */
class GptHospitalDeptXref
{
    /**
     * @var integer
     *
     * @Column(name="hd_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hdId;

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
     *   @JoinColumn(name="hospital_dept_id", referencedColumnName="hospital_dept_id")
     * })
     */
    private $hospitalDept;
}
