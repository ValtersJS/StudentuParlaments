<?php

namespace FeatureClasess;

class Event
{
  protected $pasakumaID;
  protected $nosaukums;
  protected $teksts;

  function __construct($pasakumaID, $nosaukums, $teksts)
  {
    $this->setPasakumaID($pasakumaID);
    $this->setNosaukums($nosaukums);
    $this->setTeksts($teksts);
  }


  /**
   * Get the value of pasakumaID
   */
  public function getPasakumaID()
  {
    return $this->pasakumaID;
  }

  /**
   * Set the value of pasakumaID
   *
   * @return  self
   */
  public function setPasakumaID($pasakumaID)
  {
    $this->pasakumaID = $pasakumaID;

    return $this;
  }

  /**
   * Get the value of nosaukums
   */
  public function getNosaukums()
  {
    return $this->nosaukums;
  }

  /**
   * Set the value of nosaukums
   *
   * @return  self
   */
  public function setNosaukums($nosaukums)
  {
    $this->nosaukums = $nosaukums;

    return $this;
  }

  /**
   * Get the value of teksts
   */
  public function getTeksts()
  {
    return $this->teksts;
  }

  /**
   * Set the value of teksts
   *
   * @return  self
   */
  public function setTeksts($teksts)
  {
    $this->teksts = $teksts;

    return $this;
  }
}