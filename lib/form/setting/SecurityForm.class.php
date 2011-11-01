<?php

class SecurityForm extends BaseForm
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
    $defaults = array();
    parent::__construct($defaults, $options);
  }
  
  public function setup()
  {
    $this->setWidgets(array(
      'old_password'  => new sfWidgetFormInputPassword(),
      'password1'     => new sfWidgetFormInputPassword(),
      'password2'     => new sfWidgetFormInputPassword()
    ));
    
    $this->setValidators(array(
      'old_password'  => new sfValidatorCallback(array("required"=>true,"callback" => array($this, "isCurrentPassword"))),
      'password1'     => new sfValidatorString(array("required" => true)),
      'password2'     => new sfValidatorString(array("required" => true)),
    ));
    
    $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
      new sfValidatorSchemaCompare('password1', '==', 'password2', array(), array('invalid' => 'Passwords do not match'))
    )));

    $this->widgetSchema->setLabels(array(
      "old_password"  => "Your old password",
      "password1"     => "New password",
      "password2"     => "Confirm password"
    ));
    
    $this->widgetSchema->setNameFormat("pass_change[%s]");
//    $this->widgetSchema->setFormFormatterName("list");
  }
  
  /**
   * Checks whether the current password they've entered is correct
   * 
   * @param sfValidator $validator
   * @param string $value
   * @throws sfValidatorError
   */
  public function isCurrentPassword($validator, $value)
  {
    if ($this->user->checkPassword($value)){
      return $value;
    }

    throw new sfValidatorError($validator, 'The current password you\'ve entered is incorrect');
  }
  
  /**
   * Change password
   * 
   */
  public function save()
  {
    $this->user->setPassword($this->getValue('password1'));
    $this->user->save();
    
    return $user;
  }
  
}

