<?php

namespace Arzzzen\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ArzzzenCmsBundle:Default:index.html.twig', array('name' => 'Working budle '.$name));
    }
}
