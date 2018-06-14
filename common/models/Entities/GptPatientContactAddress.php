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
     * @ManyToOne(targetEntity="GptPatientContact", inversedBy="addresses")
     * @JoinColumns({
     *   @JoinColumn(name="patient_cont_id", referencedColumnName="patient_cont_id")
     * })
     */
    private $contact;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function setAddress($address){
        $this->streetAddr1 = $address['streetAddr1'];
        $this->streetAddr2 = $address['streetAddr2'];
        $this->streetAddr3 = $address['streetAddr3'];
        $this->zipcode = $address['zipcode'];
        $this->city = $address['city'];
        $this->state = $address['state'];
        $this->country = $address['country'];
    }

    public function getAddress() {
        $address = [
            'streetAddr1'   =>  $this->streetAddr1,
            'streetAddr2'   =>  $this->streetAddr2,
            'streetAddr3'   =>  $this->streetAddr3,
            'zipcode'       =>  $this->zipcode,
            'city'          =>  $this->city,
            'state'         =>  $this->state,
            'country'       =>  $this->country
        ];
        return (object) $address;
    }

    public function setPrimary() {
        $this->primaryFlg = '1';
    }

    public function isPrimary(){
        return $this->primaryFlg == '1';
    }

    public function getContact(){
        return $this->contact;
    }

    public function setContact($contact) {
        $this->contact = $contact;
    }

    public function getId(){
        return $this->addressId;
    }

    public function setId($id){
        $this->addressId = $id;
    }

    public function __toString(){
        return  $this->streetAddr1.', '
                .$this->streetAddr2.' '
                .$this->streetAddr3.', '
                .$this->zipcode.', '
                .$this->city.', '
                .$this->state.', '
                .$this->country;
    }
}
