<?php

/**
 * GptHospitalService
 *
 * @Table(name="gpt_hospital_service")
 * @Entity
 */
class GptHospitalService
{
    /**
     * @var integer
     *
     * @Column(name="hospital_service_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $hospitalServiceId;

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
}
