<?php

class settingActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('setting','user');
  }

  public function executeUser(sfWebRequest $request) {
    $sf_guard_user = $this->getUser()->getGuardUser();
    $this->form = new UserForm($sf_guard_user);
    
    if ($request->isMethod("post")){
      $params = $request->getParameter($this->form->getName());
      $this->form->bind($params);
      
      if ($this->form->isValid()){
        $this->form->save();
        $this->redirect("/settings");
      }
    }
  }

  public function executeSecurity(sfWebRequest $request) {
    $sf_guard_user = $this->getUser()->getGuardUser();
    $this->form = new SecurityForm($sf_guard_user);
    
    if ($request->isMethod("post")){
      $params = $request->getParameter($this->form->getName());
      $this->form->bind($params);
      
      if ($this->form->isValid()){
        $this->form->save();
        $this->redirect("setting/security");
      }
    }
  }

  public function executeTrips(sfWebRequest $request) {
  }
}
