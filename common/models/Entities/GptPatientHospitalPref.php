<?php

/**
 * GptPatientHospitalPref
 *
 * @Table(name="gpt_patient_hospital_pref", indexes={@Index(name="fk_hospital_pref_patient_idx", columns={"patient_id"}), @Index(name="fk_hospital_svc_patient_idx", columns={"hospital_id"})})
 * @Entity
 */
class GptPatientHospitalPref
{
    /**
     * @var integer
     *
     * @Column(name="h_pref_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hPrefId;

    /**
     * @var integer
     *
     * @Column(name="hospital_id", type="smallint", nullable=true)
     */
    private $hospitalId;

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
     * @var \GptPatient
     *
     * @ManyToOne(targetEntity="GptPatient")
     * @JoinColumns({
     *   @JoinColumn(name="patient_id", referencedColumnName="patient_id")
     * })
     */
    private $patient;
}
