<?php

namespace Proxies\__CG__;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class GptCompany extends \GptCompany implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'GptCompany' . "\0" . 'svcCompId', '' . "\0" . 'GptCompany' . "\0" . 'companyName', '' . "\0" . 'GptCompany' . "\0" . 'companyType', '' . "\0" . 'GptCompany' . "\0" . 'companyUrl', '' . "\0" . 'GptCompany' . "\0" . 'activeFlg', '' . "\0" . 'GptCompany' . "\0" . 'lastVerifiedDt', '' . "\0" . 'GptCompany' . "\0" . 'createTs', '' . "\0" . 'GptCompany' . "\0" . 'updateTs', '' . "\0" . 'GptCompany' . "\0" . 'contacts', '' . "\0" . 'GptCompany' . "\0" . 'services'];
        }

        return ['__isInitialized__', '' . "\0" . 'GptCompany' . "\0" . 'svcCompId', '' . "\0" . 'GptCompany' . "\0" . 'companyName', '' . "\0" . 'GptCompany' . "\0" . 'companyType', '' . "\0" . 'GptCompany' . "\0" . 'companyUrl', '' . "\0" . 'GptCompany' . "\0" . 'activeFlg', '' . "\0" . 'GptCompany' . "\0" . 'lastVerifiedDt', '' . "\0" . 'GptCompany' . "\0" . 'createTs', '' . "\0" . 'GptCompany' . "\0" . 'updateTs', '' . "\0" . 'GptCompany' . "\0" . 'contacts', '' . "\0" . 'GptCompany' . "\0" . 'services'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (GptCompany $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function preCreate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'preCreate', []);

        return parent::preCreate();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyName', []);

        return parent::getCompanyName();
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyType', []);

        return parent::getCompanyType();
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyUrl()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCompanyUrl', []);

        return parent::getCompanyUrl();
    }

    /**
     * {@inheritDoc}
     */
    public function getContacts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContacts', []);

        return parent::getContacts();
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyName($companyName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyName', [$companyName]);

        return parent::setCompanyName($companyName);
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyType($companyType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyType', [$companyType]);

        return parent::setCompanyType($companyType);
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyUrl($companyUrl)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCompanyUrl', [$companyUrl]);

        return parent::setCompanyUrl($companyUrl);
    }

    /**
     * {@inheritDoc}
     */
    public function toJson()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'toJson', []);

        return parent::toJson();
    }

    /**
     * {@inheritDoc}
     */
    public function getServices()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getServices', []);

        return parent::getServices();
    }

}
