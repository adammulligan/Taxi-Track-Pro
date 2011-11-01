<?php

/**
 * Outing filter form base class.
 *
 * @package    TaxiTrackPro
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOutingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'start_time'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'end_time'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'start_miles'   => new sfWidgetFormFilterInput(),
      'end_miles'     => new sfWidgetFormFilterInput(),
      'fuel_cost'     => new sfWidgetFormFilterInput(),
      'fuel_paid_for' => new sfWidgetFormFilterInput(),
      'journey_count' => new sfWidgetFormFilterInput(),
      'comments'      => new sfWidgetFormFilterInput(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
      'is_complete'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'start_time'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'end_time'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'start_miles'   => new sfValidatorPass(array('required' => false)),
      'end_miles'     => new sfValidatorPass(array('required' => false)),
      'fuel_cost'     => new sfValidatorPass(array('required' => false)),
      'fuel_paid_for' => new sfValidatorPass(array('required' => false)),
      'journey_count' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comments'      => new sfValidatorPass(array('required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
      'is_complete'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('outing_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Outing';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'start_time'    => 'Date',
      'end_time'      => 'Date',
      'start_miles'   => 'Text',
      'end_miles'     => 'Text',
      'fuel_cost'     => 'Text',
      'fuel_paid_for' => 'Text',
      'journey_count' => 'Number',
      'comments'      => 'Text',
      'user_id'       => 'ForeignKey',
      'is_complete'   => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
