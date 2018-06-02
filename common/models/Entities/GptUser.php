<?php

/**
 * GptUser
 *
 * @Table(name="gpt_user", uniqueConstraints={@UniqueConstraint(name="email", columns={"email"}), @UniqueConstraint(name="username", columns={"username"})})
 * @Entity
 */
class GptUser
{
    const USER_STATUS_ACTIVE = 1;
    const USER_STATUS_INACTIVE = 2;
    const USER_STATUS_AWAITING_VERIFICATION = 3;

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
     * @var integer
     *
     * @Column(name="status", type="integer", nullable=false)
     */
    private $status = 0;

    /**
     * @var string
     *
     * @Column(name="verification_code", type="string", length=255, nullable=false)
     */
    private $verificationCode;

    /**
     * @var string
     *
     * @Column(name="passwd", type="string", length=255, nullable=false)
     */
    private $passwd;

    /**
     * @var string
     *
     * @Column(name="passwd_recovery_code", type="string", length=255, nullable=true)
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
    public function isActive()
    {
        return ($this->getStatus() === self::USER_STATUS_ACTIVE);
    }
    public function getPassword()
    {
        return $this->passwd;
    }
    public function setPassword($passwd)
    {
        $this->passwd = $passwd;
    }
    public function getAssociationId()
    {
        return $this->association_id;
    }

    public function setAssociationId($associationId)
    {
        return $this->association_id = $associationId;
    }
    public function getRole()
    {
        return $this->role;
    }
    public function setUserName($username)
    {
        return $this->username = $username;
    }
    public function getDetail(Doctrine\ORM\EntityManager $em)
    {
        if ($this->getRole() === self::USER_ROLE_PATIENT) {
            return $em->getRepository('GptPatient')->findOneBy([
              'patientId'  =>  $this->getAssociationId()
            ]);
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }
    public function preCreate()
    {
        $this->createdAt = new \DateTime();
        $this->modifiedAt = new \DateTime();
    }

    public function setVerificationCode($code)
    {
        $this->verificationCode = $code;
    }

    public function getUserName()
    {
        return $this->username;
    }

    public function generateVerificationCode()
    {
        $data = (object) array($this->getUserName(), $this->getAssociationId());
        return urlencode(base64_encode(json_encode($data)));
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function getVerificationCode()
    {
        return $this->verificationCode;
    }

    public function getVerificationLink()
    {
        $code = $this->getVerificationCode();

        switch ($this->getRole()) {

        case self::USER_ROLE_PATIENT:
          return base_url().'p/v/'.$code;
        break;

        case self::USER_ROLE_HOSPITAL_REP:
          return base_url().'h/v/'.$code;
        break;

        case self::USER_ROLE_SERVICE_PROVIDER:
          return base_url().'s/v/'.$code;
        break;

      }
    }
}
