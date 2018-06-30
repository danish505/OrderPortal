<?php

/**
 * GptHospitalContactPhone
 *
 * @Table(name="gpt_hospital_contact_phone", indexes={@Index(name="fk_phone_cont_id_idx", columns={"cont_id"})})
 * @Entity
 */
class GptHospitalContactPhone
{
    /**
     * @var integer
     *
     * @Column(name="phone_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $phoneId;

    /**
     * @var string
     *
     * @Column(name="ctry_cd", type="string", length=3, nullable=true)
     */
    private $ctryCd;

    /**
     * @var string
     *
     * @Column(name="area_cd", type="string", length=6, nullable=true)
     */
    private $areaCd;

    /**
     * @var string
     *
     * @Column(name="phone_no", type="string", length=11, nullable=true)
     */
    private $phoneNo;

    /**
     * @var string
     *
     * @Column(name="extension", type="string", length=6, nullable=true)
     */
    private $extension;

    /**
     * @var boolean
     *
     * @Column(name="active_flg", type="boolean", nullable=false)
     */
    private $activeFlg = '1';

    /**
     * @var boolean
     *
     * @Column(name="primary_flg", type="boolean", nullable=true)
     */
    private $primaryFlg = '0';

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
     * @ManyToOne(targetEntity="GptHospitalContact", inversedBy="phone_numbers")
     * @JoinColumns({
     *   @JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $contact;

    public function preCreate()
    {
        $this->createTs = new \DateTime();
        $this->updateTs = new \DateTime();
    }

    public function setPhone($phone) {
        $this->ctryCd = $phone['ctryCd'];
        $this->areaCd = $phone['areaCd'];
        $this->phoneNo = $phone['phoneNo'];
        $this->extension = $phone['extension'];
    }

    public function getPhone(){
        return (object) [
            'ctryCd' => $this->ctryCd,
            'areaCd' => $this->areaCd,
            'phoneNo' => $this->phoneNo,
            'extension' => $this->extension,
        ];
    }

    public function __toString() {
        return "+".$this->ctryCd." ".$this->areaCd." ".$this->phoneNo
                .($this->extension != ''?(' ext:'.$this->extension):'');
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

    public function setContact($contact){
        $this->contact = $contact;
    }

    public function getId(){
        return $this->phoneId;
    }

    public function setId($id){
        $this->phoneId = $id;
    }

    public function toJson(){
        return [
            'phone_id' => $this->phoneId,
            'contact_id' => $this->contact->getId(),
            'ctry_code' => $this->ctryCd,
            'area_code' => $this->areaCd,
            'phone_no' => $this->phoneNo,
            'extension' => $this->extension,
        ];
    }
}
