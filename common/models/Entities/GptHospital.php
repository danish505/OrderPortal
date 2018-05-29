<?php

/**
 * GptHospital
 *
 * @Table(name="gpt_hospital", uniqueConstraints={@UniqueConstraint(name="hospital_name_UNIQUE", columns={"hospital_name"})}, indexes={@Index(name="fk_hospital_status1_idx", columns={"status_id"})})
 * @Entity
 */
class GptHospital
{
    /**
     * @var integer
     *
     * @Column(name="hospital_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
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
     * @Column(name="active_flg", type="boolean", nullable=false)
     */
    private $activeFlg = '1';

    /**
     * @var \DateTime
     *
     * @Column(name="last_verified_dt", type="datetime", nullable=true)
     */
    private $lastVerifiedDt = 'CURRENT_TIMESTAMP';

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
     * @var \GptHospitalStatus
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="GptHospitalStatus")
     * @JoinColumns({
     *   @JoinColumn(name="status_id", referencedColumnName="status_id")
     * })
     */
    private $status;
}
