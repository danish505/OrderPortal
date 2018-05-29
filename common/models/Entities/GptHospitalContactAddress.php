<?php

/**
 * GptHospitalContactAddress
 *
 * @Table(name="gpt_hospital_contact_address", indexes={@Index(name="fk_address_cont_id_idx", columns={"cont_id"})})
 * @Entity
 */
class GptHospitalContactAddress
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
     * @var \GptHospitalContact
     *
     * @ManyToOne(targetEntity="GptHospitalContact")
     * @JoinColumns({
     *   @JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $cont;
}
