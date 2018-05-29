<?php

/**
 * GptUserRole
 *
 * @Table(name="gpt_user_role")
 * @Entity
 */
class GptUserRole
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var boolean
     *
     * @Column(name="role", type="boolean", nullable=true)
     */
    private $role;
}
