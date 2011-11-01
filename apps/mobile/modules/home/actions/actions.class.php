<?php

/**
 * home actions.
 *
 * @package    TaxiTrackPro
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $trip = Doctrine_Query::create()
                          ->select('*')
                          ->from('Outing')
                          ->where('is_complete=?',false)
                          ->andWhere('user_id=?',$this->getUser()->getGuardUser()->getId())
                          ->orderBy('id DESC')
                          ->limit(1)
                          ->fetchArray();

    if (!empty($trip)) {
      $this->running=true;
      $this->details=$trip[0]; // Always return the latest non complete project (theoretically can't get anymore anyway)
    }
  }
}
