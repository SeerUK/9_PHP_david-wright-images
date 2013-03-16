<?php

namespace SeerUK\DWright\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SeerUKDWrightCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
