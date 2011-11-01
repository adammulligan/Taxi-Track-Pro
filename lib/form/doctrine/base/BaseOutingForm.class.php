<?php

/**
 * Outing form base class.
 *
 * @method Outing getObject() Returns the current form's model object
 *
 * @package    TaxiTrackPro
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOutingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'start_time'    => new sfWidgetFormInputText(),
      'end_time'      => new sfWidgetFormInputText(),
      'start_miles'   => new sfWidgetFormInputText(),
      'end_miles'     => new sfWidgetFormInputText(),
      'fuel_cost'     => new sfWidgetFormInputText(),
      'fuel_paid_for' => new sfWidgetFormInputText(),
      'journey_count' => new sfWidgetFormInputText(),
      'comments'      => new sfWidgetFormTextarea(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'is_complete'   => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'start_time'    => new sfValidatorPass(array('required' => false)),
      'end_time'      => new sfValidatorPass(array('required' => false)),
      'start_miles'   => new sfValidatorPass(array('required' => false)),
      'end_miles'     => new sfValidatorPass(array('required' => false)),
      'fuel_cost'     => new sfValidatorPass(array('required' => false)),
      'fuel_paid_for' => new sfValidatorPass(array('required' => false)),
      'journey_count' => new sfValidatorInteger(array('required' => false)),
      'comments'      => new sfValidatorString(array('required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
      'is_complete'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('outing[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Outing';
  }

}
