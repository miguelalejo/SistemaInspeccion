<?php
// auto-generated by sfViewConfigHandler
// date: 2014/05/22 04:22:45
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('bootstrap.css', '', array ());
  $response->addStylesheet('offcanvas.css', '', array ());
  $response->addStylesheet('bootstrap-combobox.css', '', array ());
  $response->addJavascript('jquery-1.10.2.min.js', '', array ());
  $response->addJavascript('bootstrap.js', '', array ());
  $response->addJavascript('bootstrap-combobox.js', '', array ());
  $response->addJavascript('offcanvas.js', '', array ());
  $response->addJavascript('enumareaciones.js', '', array ());
  $response->addJavascript('jquery.inputmask.js', '', array ());
  $response->addJavascript('jquery.inputmask.regex.extensions.js', '', array ());
  $response->addJavascript('aplicacion.mascara.js', '', array ());
  $response->addJavascript('error.mensaje.alerta.js', '', array ());
  $response->addJavascript('jquery.core.widgets.js', '', array ());
  $response->addJavascript('animaciones.js', '', array ());


