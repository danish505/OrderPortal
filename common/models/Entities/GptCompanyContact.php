<?php

/**
 * GptCompanyContact
 *
 * @Table(name="gpt_company_contact", indexes={@Index(name="fk_contact_company1_idx", columns={"svc_comp_id"})})
 * @Entity
 */
class GptCompanyContact
{
    /**
     * @var integer
     *
     * @Column(name="cont_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $contId;

    /**
     * @var string
     *
     * @Column(name="salutation", type="string", length=100, nullable=true)
     */
    private $salutation;

    /**
     * @var string
     *
     * @Column(name="first_name", type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @Column(name="middle_name", type="string", length=100, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @Column(name="last_name", type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @Column(name="job_title", type="string", length=100, nullable=true)
     */
    private $jobTitle;

    /**
     * @var string
     *
     * @Column(name="job_fuction", type="string", length=100, nullable=true)
     */
    private $jobFuction;

    /**
     * @var string
     *
     * @Column(name="job_role", type="string", length=100, nullable=true)
     */
    private $jobRole;

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
     * @ManyToOne(targetEntity="GptCompany")
     * @JoinColumns({
     *   @JoinColumn(name="svc_comp_id", referencedColumnName="svc_comp_id")
     * })
     */
    private $svcComp;
}
