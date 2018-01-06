<?php
namespace Siegelion\Storage\Persistence\Entity;

/**
 * @Entity
 * @Table(name="producttype")
 */
class Producttype
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    public $producttypeid;

    /**
     * @Column(type="string")
     */
    public $name;

    /**
     * @Column(type="text")
     */
    public $description;

    /**
     * Get producttypeid
     *
     * @return integer
     */
    public function getProducttypeid()
    {
        return $this->producttypeid;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}