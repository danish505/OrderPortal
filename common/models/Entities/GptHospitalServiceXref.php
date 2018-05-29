<?php

/**
 * GptHospitalServiceXref
 *
 * @Table(name="gpt_hospital_service_xref", indexes={@Index(name="fk_hospital_service_xref_hospital_dept1_idx", columns={"hospital_dept_id"}), @Index(name="fk_hospital_service_xref_hospital_service1_idx", columns={"hospital_service_id"})})
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
    private $hospitalDept;

    /**
     * @var \GptHospitalService
     *
     * @ManyToOne(targetEntity="GptHospitalService")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_service_id", referencedColumnName="hospital_service_id")
     * })
     */
    private $hospitalService;
}
