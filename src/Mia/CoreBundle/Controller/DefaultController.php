<?php

namespace Mia\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MiaCoreBundle:Default:index.html.twig', array('name' => $name));
    }
}
