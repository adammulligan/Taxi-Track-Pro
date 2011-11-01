<?php

class tripActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
  }

  public function executeStart(sfWebRequest $request) {
    $prev = Doctrine_Query::create()
                          ->select('*')
                          ->from('Outing')
                          ->where('user_id=?',$this->getUser()->getGuardUser()->getId())
                          ->orderBy('id DESC')
                          ->limit(1)
                          ->fetchArray();

    $miles = 0;
    if (!empty($prev)) {
      // TODO: check if start time is null
      if ($prev[0]['is_complete']==false) {
        $this->redirect('/');
      }

      if ($prev[0]['end_miles']>=0) {
        $miles = $prev[0]['end_miles'];
      }
    }

    $trip = new Outing();
    $trip->setStartTime(date('c'));
    $trip->setStartMiles($miles);
    $trip->setUserId($this->getUser()->getGuardUser()->getId());
    $trip->save();

    $this->redirect('/');
  }

  public function executeStop(sfWebRequest $request) {
    $trip = Doctrine_Query::create()
                          ->select('*')
                          ->from('Outing')
                          ->where('is_complete=?',false)
                          ->andWhere('user_id=?',$this->getUser()->getGuardUser()->getId())
                          ->orderBy('id DESC')
                          ->limit(1)
                          ->fetchArray();

    if (!empty($trip)) {
      $trip = Doctrine::getTable('Outing')->findOneById($trip[0]['id']);
      if ($trip!=null) {
        $trip->delete();
        $this->redirect('/');
      }
    }

    $this->redirect('/');
  }

  public function executeComplete(sfWebRequest $request) {
    if ($request->isMethod('post')) {
      $trip = Doctrine::getTable('Outing')->findOneById($request->getParameter('trip_id'));

      if ($trip!=null){
        if ($trip->getUserId()!=$this->getUser()->getGuardUser()->getId()) {
          $this->redirect('/');
        }

        $params = $request->getParameterHolder()->getAll();

        $params['start_time'] = $trip->getStartTime();
        $params['end_time'] = $params['end_date']." ".$params['end_time'];
        unset($params['end_date']);

        $trip->fromArray($params);
        $trip->setIsComplete(true);
        $trip->save();

        $this->redirect('/');
      }
    } else {
      $data=Doctrine::getTable('Outing')->findOneById($request->getParameter('id'));

      if ($data!=null) {
        if ($data->getUserId()!=$this->getUser()->getGuardUser()->getId()) {
          $this->redirect('/');
        }

        $this->trip = $data;
      }
    }
  }
}
