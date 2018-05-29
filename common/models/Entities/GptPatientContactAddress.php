<?php

/**
 * GptPatientContactAddress
 *
 * @Table(name="gpt_patient_contact_address", indexes={@Index(name="fk_address_patient_contact1_idx", columns={"patient_cont_id"})})
 * @Entity
 */
class GptPatientContactAddress
{
    /**
     * @var integer
     *
     * @Column(name="address_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $addressId;

    /**
     * @var string
     *
     * @Column(name="street_addr_1", type="string", length=200, nullable=true)
     */
    private $streetAddr1;

    /**
     * @var string
     *
     * @Column(name="street_addr_2", type="string", length=100, nullable=true)
     */
    private $streetAddr2;

    /**
     * @var string
     *
     * @Column(name="street_addr_3", type="string", length=100, nullable=true)
     */
    private $streetAddr3;

    /**
     * @var string
     *
     * @Column(name="city", type="string", length=100, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(name="state", type="string", length=100, nullable=true)
     */
    private $state;

    /**
     * @var integer
     *
     * @Column(name="zipcode", type="smallint", nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @Column(name="country", type="string", length=100, nullable=true)
     */
    private $country;

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
     * @var \GptPatientContact
     *
     * @ManyToOne(targetEntity="GptPatientContact")
     * @JoinColumns({
     *   @JoinColumn(name="patient_cont_id", referencedColumnName="patient_cont_id")
     * })
     */
    private $patientCont;
}