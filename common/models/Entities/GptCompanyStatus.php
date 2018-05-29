<?php

/**
 * GptCompanyStatus
 *
 * @Table(name="gpt_company_status")
 * @Entity
 */
class GptCompanyStatus
{
    /**
     * @var boolean
     *
     * @Column(name="status_id", type="boolean", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $statusId;

    /**
     * @var string
     *
     * @Column(name="status", type="string", length=100, nullable=true)
     */
    private $status;

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
