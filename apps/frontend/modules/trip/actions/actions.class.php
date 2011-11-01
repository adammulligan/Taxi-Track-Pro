<?php

class tripActions extends sfActions
{
  public function executeIndex(sfWebRequest $request) {
    $trip = Doctrine::getTable('Outing')->findOneById($request->getParameter('id'));

    if ($trip!=null) {
      if ($trip->getIsComplete()) {
        $this->trip=$trip;
      }
    } else {
      $this->redirect('/');
    }
  }

  public function executeList(sfWebRequest $request) {
    $outings = Doctrine::getTable('Outing')->findByUserId($this->getUser()->getGuardUser()->getId());

    $this->getResponse()->setContentType('application/json');

    if ($outings!=null) {
      $outings = $outings->toArray();
      $output  = array();

      foreach ($outings as $outing) {
        $output[] = array('id'     => $outing['id'],
                          'title'  => 'Journey',
                          'start'  => $outing['start_time'],
                          'end'    => $outing['is_complete']==true ? $outing['end_time'] : $outing['start_time'],
                          'color'  => $outing['is_complete']==true ? 'blue' : 'red',
                          'allDay' => false,
                         );
      }

      return $this->renderText(json_encode($output));
    } else {
      return $this->renderText(json_encode(array()));
    }
  }

  public function executeAdd(sfWebRequest $request) {
  }

  public function executeAddByAjax(sfWebRequest $request) {
    $this->getResponse()->setContentType('application/json');

    if ($request->isMethod('post') && $request->hasParameter('start') && $request->hasParameter('end')) {
      $outing = new Outing();
      $outing->setStartTime($request->getParameter('start'));
      $outing->setEndTime($request->getParameter('end'));
      $outing->setUserId($this->getUser()->getGuardUser()->getId());
      $outing->save();

      return $this->renderText(json_encode(array('success')));
    }

    return $this->renderText(json_encode(array('failed')));
  }

  public function executeDelete(sfWebRequest $request) {
    if ($request->hasParameter('id')) {
      $trip = Doctrine::getTable('Outing')->findOneById($request->getParameter('id'));

      if ($trip!=null) {
        $trip->delete();
        $this->redirect('/');
      }
    } else {
      $this->redirect('/');
    }
  }

  public function executeDeleteAllByAjax(sfWebRequest $request) {
    $this->getResponse()->setContentType('application/json');

    $q = Doctrine_Query::create()
                       ->delete('Outing')
                       ->execute();

    return $this->renderText(json_encode(array('success')));
  }
}
