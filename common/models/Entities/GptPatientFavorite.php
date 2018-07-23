<?php

/**
 * GptPatientFavorite
 *
 * @Table(name="gpt_patient_favorite", indexes={@Index(name="fk_patient_favorite_1", columns={"patient_id"})})
 * @Entity
 */
class GptPatientFavorite
{
    /**
     * @var integer
     *
     * @Column(name="patient_favorite_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $patientFavoriteId;

    /**
     * @var string
     *
     * @Column(name="type", type="string", length=50, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @Column(name="reference_id", type="string", length=50, nullable=true)
     * 
     */
    private $referenceId;

    /**
     * @var \GptPatient
     *
     * @ManyToOne(targetEntity="GptPatient", inversedBy="favorites")
     * @JoinColumns({
     *   @JoinColumn(name="patient_id", referencedColumnName="patient_id")
     * })
     */
    private $patient;

    public function setReferenceId($referenceId){
        $this->referenceId = $referenceId;
    }

    public function getReferenceId() {
        return $this->referenceId;
    }

    public function getType()
    {
        return $this->type ;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setPatient(GptPatient $patient) {
        $this->patient = $patient;
    }

    public function getPatient() {
        return $this->patient;
    }
    public function getId(){
        return $this->patientContId;
    }
}
