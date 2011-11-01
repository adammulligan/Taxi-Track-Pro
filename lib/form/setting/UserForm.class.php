<?php

class UserForm extends BaseForm
{
  /**
   * Current user
   * 
   * @var sfGuardUser
   */
  private $user = null;
  
  public function __construct(sfGuardUser $user, $options = array())
  {
    $this->user = $user;
    $defaults = array(
      "firstname"     => $this->user->getFirstName(),
      "lastname"      => $this->user->getLastName(),
      "email_address" => $this->user->getEmailAddress(),
    );
    
    
    parent::__construct($defaults, $options);
  }
  
  public function setup()
  {
    $culture = "en_GB";
    
    $this->setWidgets(array(
      "firstname"     => new sfWidgetFormInputText(),
      "lastname"      => new sfWidgetFormInputText(),
      "email_address" => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
        "firstname"     => new sfValidatorString(array("required" => true)),
        "lastname"      => new sfValidatorString(array("required" => true)),
        "email_address" => new sfValidatorAnd(array(
          new sfValidatorEmail(array("required" => true)),
          new sfValidatorCallback(array("callback" => array($this, "checkDuplicateEmail")))
        )),
      ));

    $this->widgetSchema->setLabels(array(
      'firstname'    => 'First name',
      'lastname'   => 'Last name',
      'email_address' => 'Email address',
    ));
    
    $this->widgetSchema->setNameFormat("account[%s]");
  }
  
  /**
   * Check the email address isn"t already being used
   * 
   * @param sfValidator $validator
   * @param mixed $value
   * @throws sfValidatorError
   */
  public function checkDuplicateEmail($validator, $value)
  {
    $q = Doctrine_Query::create()
      ->select("u.*")
      ->from("SfGuardUser u")
      ->where("u.id != ?", $this->user->getId())
      ->andWhere("u.email_address = ?", $value);

    $sf_guard_user = $q->fetchOne();

    if ($sf_guard_user != null){
      throw new sfValidatorError($validator, "That email address is already in user by another account");
    }

    return $value;
  }
  
  /**
   * Save account information
   * 
   */
  public function save()
  {
    $this->user->setFirstName($this->getValue("firstname"));
    $this->user->setLastName($this->getValue("lastname"));
    $this->user->setEmailAddress($this->getValue("email_address"));
    $this->user->save();
  }
}

