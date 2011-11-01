<?php

class statsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
  }

  public function executeGetEarnings(sfWebRequest $request) {
    $this->getResponse()->setContentType('application/json');

    if ($request->hasParameter('start') && $request->hasParameter('end')) {
      $data = Doctrine_Query::create()
                            ->select('*')
                            ->from('Outing')
                            ->where('user_id=?',$this->getUser()->getGuardUser()->getId())
                            ->fetchArray();

      $earnings=0;
      if (!empty($data)) {
        foreach ($data as $k => $v) {
          if (strtotime(date('Y-m-d',strtotime($v['start_time']))) >= strtotime($request->getParameter('start'))
            && strtotime(date('Y-m-d',strtotime($v['end_time']))) <= strtotime($request->getParameter('end'))) {
            if ($v['is_complete']) {
              $earnings+=$v['earnings'];
            }
          } else {
            unset($data[$k]);
          }
        }
      }

      return $this->renderText(json_encode(array('earnings'=>$earnings)));
    }

    return $this->renderText(json_encode(array()));
  }

  public function executeGetMileage(sfWebRequest $request) {
    $this->getResponse()->setContentType('application/json');

    if ($request->hasParameter('start') && $request->hasParameter('end')) {
      $data = Doctrine_Query::create()
                            ->select('*')
                            ->from('Outing')
                            ->where('user_id=?',$this->getUser()->getGuardUser()->getId())
                            ->fetchArray();

      $mileage=0;
      if (!empty($data)) {
        foreach ($data as $k => $v) {
          if (strtotime(date('Y-m-d',strtotime($v['start_time']))) >= strtotime($request->getParameter('start'))
            && strtotime(date('Y-m-d',strtotime($v['end_time']))) <= strtotime($request->getParameter('end'))) {
            if ($v['is_complete']) {
              $mileage+=$v['end_miles']-$v['start_miles'];
            }
          } else {
            unset($data[$k]);
          }
        }
      }

      return $this->renderText(json_encode(array('mileage'=>$mileage)));
    }

    return $this->renderText(json_encode(array()));
  }
}
