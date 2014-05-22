<?php

class BasesfGuardFormSignin extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInput(array('type' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());
	$this->widgetSchema['username']->setAttribute('id', 'signin_username');
	$this->widgetSchema['username']->setAttribute('class', 'form-control');
	$this->widgetSchema['username']->setAttribute('placeholder', 'Usuario');
	$this->widgetSchema['username']->setAttribute('autofocus','autofocus');
	$this->widgetSchema['username']->setAttribute('required','required');	
	$this->widgetSchema['password']->setAttribute('id', 'signin_username');
	$this->widgetSchema['password']->setAttribute('class', 'form-control');
	$this->widgetSchema['password']->setAttribute('placeholder', 'Contrase&ntilde;a');
	$this->widgetSchema['password']->setAttribute('autofocus','autofocus');
	$this->widgetSchema['password']->setAttribute('required','required');
	$this->widgetSchema->setLabels(array(
	'username'    => 'Usuario',
	'password'   => 'Password',
	'remember' => 'Recordarme',
	));
    $this->widgetSchema->setNameFormat('signin[%s]');
  }
}
