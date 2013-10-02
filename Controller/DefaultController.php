<?php

namespace Arzzzen\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Template()
     */
    public function pageAction($route)
    {
        $em = $this->getDoctrine()->getManager();

        $page = $em->getRepository('ArzzzenCmsBundle:Page')->findOneBy(array('route' => $route));

        return array('page' => $page);
    }
}
