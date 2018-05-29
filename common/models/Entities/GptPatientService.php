<?php

/**
 * GptPatientService
 *
 * @Table(name="gpt_patient_service", indexes={@Index(name="fk_patient_service_hospital_pref_idx", columns={"hospital_id"})})
 * @Entity
 */
class GptPatientService
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
     * @var string
     *
     * @Column(name="service_name", type="string", length=100, nullable=true)
     */
    private $serviceName;

    /**
     * @var string
     *
     * @Column(name="service_category", type="string", length=100, nullable=true)
     */
    private $serviceCategory;

    /**
     * @var string
     *
     * @Column(name="service_sub_category", type="string", length=100, nullable=true)
     */
    private $serviceSubCategory;

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
     * @var \GptPatientHospitalPref
     *
     * @ManyToOne(targetEntity="GptPatientHospitalPref")
     * @JoinColumns({
     *   @JoinColumn(name="hospital_id", referencedColumnName="hospital_id")
     * })
     */
    private $hospital;
}
