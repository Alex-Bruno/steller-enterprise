<?php


namespace App\Entity\traits;


trait EntityEnabledTrait
{
    /**
     * @var boolean
     * @ORM\Column(type="boolean", options={"default" : 1})
     */
    private $enabled;

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled)
    {
        $this->enabled = $enabled;
    }


}