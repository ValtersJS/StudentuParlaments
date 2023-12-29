<?php

namespace FeatureClasess;

class Message
{
    protected $ZinasID;
    protected $LietotajaID;
    protected $Datums;
    protected $Teksts;

    function __construct($ZinasID, $LietotajaID, $Datums, $Teksts)
    {
        $this->setZinasID($ZinasID);
        $this->setLietotajaID($LietotajaID);
        $this->setDatums($Datums);
        $this->setTeksts($Teksts);
    }

    /**
     * Get the value of ZinasID
     */
    public function getZinasID()
    {
        return $this->ZinasID;
    }

    /**
     * Set the value of ZinasID
     *
     * @return  self
     */
    public function setZinasID($ZinasID)
    {
        $this->ZinasID = $ZinasID;

        return $this;
    }

    /**
     * Get the value of LietotajaID
     */
    public function getLietotajaID()
    {
        return $this->LietotajaID;
    }

    /**
     * Set the value of LietotajaID
     *
     * @return  self
     */
    public function setLietotajaID($LietotajaID)
    {
        $this->LietotajaID = $LietotajaID;

        return $this;
    }

    /**
     * Get the value of Datums
     */
    public function getDatums()
    {
        return $this->Datums;
    }

    /**
     * Set the value of Datums
     *
     * @return  self
     */
    public function setDatums($Datums)
    {
        $this->Datums = $Datums;

        return $this;
    }

    /**
     * Get the value of Teksts
     */
    public function getTeksts()
    {
        return $this->Teksts;
    }

    /**
     * Set the value of Teksts
     *
     * @return  self
     */
    public function setTeksts($Teksts)
    {
        $this->Teksts = $Teksts;

        return $this;
    }
}