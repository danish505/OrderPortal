<?php

/**
 * GptUser
 *
 * @Table(name="gpt_user", uniqueConstraints={@UniqueConstraint(name="email", columns={"email"}), @UniqueConstraint(name="username", columns={"username"})})
 * @Entity
 */
class GptUser
{
    /**
     * @var integer
     *
     * @Column(name="user_id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @Column(name="username", type="string", length=12, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @Column(name="auth_level", type="boolean", nullable=false)
     */
    private $authLevel;

    /**
     * @var boolean
     *
     * @Column(name="banned", type="boolean", nullable=false)
     */
    private $banned = '0';

    /**
     * @var string
     *
     * @Column(name="passwd", type="string", length=60, nullable=false)
     */
    private $passwd;

    /**
     * @var string
     *
     * @Column(name="passwd_recovery_code", type="string", length=60, nullable=true)
     */
    private $passwdRecoveryCode;

    /**
     * @var \DateTime
     *
     * @Column(name="passwd_recovery_date", type="datetime", nullable=true)
     */
    private $passwdRecoveryDate;

    /**
     * @var \DateTime
     *
     * @Column(name="passwd_modified_at", type="datetime", nullable=true)
     */
    private $passwdModifiedAt;

    /**
     * @var \DateTime
     *
     * @Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var \DateTime
     *
     * @Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Column(name="modified_at", type="datetime", nullable=false)
     */
    private $modifiedAt = 'CURRENT_TIMESTAMP';
}
