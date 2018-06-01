<?php

/**
 * GptUser
 *
 * @Table(name="gpt_user", uniqueConstraints={@UniqueConstraint(name="email", columns={"email"}), @UniqueConstraint(name="username", columns={"username"})})
 * @Entity
 */
class GptUser
{
    const USER_BANNED = true;
    const USER_NOT_BANNED = false;

    const USER_ROLE_PATIENT = 'PATIENT';
    const USER_ROLE_HOSPITAL_REP = 'HOSPITAL_REP';
    const USER_ROLE_SERVICE_PROVIDER = 'SERVICE_PROVIDER';

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
    private $name;
    /**
     * @var string
     *
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @Column(name="role", type="string", length=50, nullable=true)
     */
    private $role;

    /**
     * @var integer
     *
     * @Column(name="association_id", type="integer", length=4, nullable=false)
     */
    private $association_id;

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

    public function getId()
    {
        return $this->userId;
    }
    public function isBanned()
    {
        return ((boolean) $this->banned === self::USER_BANNED);
    }
    public function getPassword()
    {
        return $this->passwd;
    }
    public function getAssociationId()
    {
        return $this->association_id;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function getEmail()
    {
        return $this->role;
    }
    public function getDetail(Doctrine\ORM\EntityManager $em)
    {
        if ($this->getRole() === self::USER_ROLE_PATIENT) {
            return $em->getRepository('GptPatient')->findOneBy([
              'patientId'  =>  $this->getAssociationId()
            ]);
        }
    }
}
