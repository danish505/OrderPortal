<?php

/**
 * GptPatient
 *
 * @Table(name="gpt_patient")
 * @Entity
 */
class GptPatient
{
    /**
     * @var integer
     *
     * @Column(name="patient_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $patientId;

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
     * @Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var boolean
     *
     * @Column(name="age", type="boolean", nullable=true)
     */
    private $age;

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
}
