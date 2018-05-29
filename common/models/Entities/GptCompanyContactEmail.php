<?php

/**
 * GptCompanyContactEmail
 *
 * @Table(name="gpt_company_contact_email", indexes={@Index(name="fk_email_contact1_idx", columns={"cont_id"})})
 * @Entity
 */
class GptCompanyContactEmail
{
    /**
     * @var integer
     *
     * @Column(name="email_id", type="smallint", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $emailId;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

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
     * @var \GptCompanyContact
     *
     * @ManyToOne(targetEntity="GptCompanyContact")
     * @JoinColumns({
     *   @JoinColumn(name="cont_id", referencedColumnName="cont_id")
     * })
     */
    private $cont;
}
