<?php
// auto-generated by sfViewConfigHandler
// date: 2018/03/01 10:16:42
$context  = $this->getContext();
$response = $context->getResponse();


  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'symfony project', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'symfony project', false, false);
  $response->addMeta('keywords', 'symfony, project', false, false);
  $response->addMeta('language', 'en', false, false);

  $response->addStylesheet('main', '', array ());
  $response->addStylesheet('animate', '', array ());
  $response->addStylesheet('bootstrap', '', array ());
  $response->addStylesheet('custom', '', array ());
  $response->addStylesheet('font-awesome', '', array ());
  $response->addStylesheet('nexus', '', array ());
  $response->addStylesheet('responsive', '', array ());
  $response->addJavascript('bootstrap.min', '');
  $response->addJavascript('jquery.isotope', '');
  $response->addJavascript('jquery.min', '');
  $response->addJavascript('jquery.slicknav', '');
  $response->addJavascript('jquery.sticky', '');
  $response->addJavascript('jquery.visible', '');
  $response->addJavascript('modernizr.custom', '');
  $response->addJavascript('scripts', '');
  $response->addJavascript('slimbox', '');


