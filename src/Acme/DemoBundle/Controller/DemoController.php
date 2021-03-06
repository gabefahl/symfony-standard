<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DemoController extends Controller
{
    /**
     * @Route("/", name="_demo")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/hello/{name}", name="_demo_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/contact/{name}", name="_demo_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $testService = $this->get('acme.demo.test_service');
        $requestStackName = $testService->getName();
        
        $contactDocument = new \Acme\DemoBundle\Document\Contact();
                
        $form = $this->createForm(new ContactType(), $contactDocument);
        $form->handleRequest($request);

        return array('form' => $form->createView(), 'name' => $requestStackName);
    }
}
