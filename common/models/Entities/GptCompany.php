<?php

/**
 * GptCompany
 *
 * @Table(name="gpt_company", uniqueConstraints={@UniqueConstraint(name="hospital_name_UNIQUE", columns={"company_name"})}, indexes={@Index(name="fk_patient_status1_idx_idx", columns={"status_id"})})
 * @Entity
 */
class GptCompany
{
    /**
     * @var integer
     *
     * @Column(name="svc_comp_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
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
     * @var \GptCompanyStatus
     *
     * @Id
     * @GeneratedValue(strategy="NONE")
     * @OneToOne(targetEntity="GptCompanyStatus")
     * @JoinColumns({
     *   @JoinColumn(name="status_id", referencedColumnName="status_id")
     * })
     */
    private $status;
}
