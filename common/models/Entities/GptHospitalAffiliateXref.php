<?php

/**
 * GptHospitalAffiliateXref
 *
 * @Table(name="gpt_hospital_affiliate_xref", uniqueConstraints={@UniqueConstraint(name="affiliate_id", columns={"hospital_id", "affiliate_hospital_id"})}, indexes={@Index(name="fk_hospital_id_idx", columns={"hospital_id"})})
 * @Entity
 */
class GptHospitalAffiliateXref
{
    /**
     * @var integer
     *
     * @Column(name="affiliate_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $affiliateId;

    /**
     * @var integer
     *
     * @Column(name="affiliate_hospital_id", type="smallint", nullable=false)
     */
    private $affiliateHospitalId;

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
}
