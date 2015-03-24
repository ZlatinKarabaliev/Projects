<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use  Acme\DemoBundle\Entity\Contact;
use Doctrine\DBAL\DriverManager;
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
     * @Route("/contact", name="_demo_contact")
     * @Template()
     */
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());
        $form->handleRequest($request);

        if ($form->isValid()) {

            
            //Send mailw with swiftmailer
            
//            $mailer = $this->get('mailer');
//            $message = $mailer->createMessage()
//                ->setSubject('Hello Email')
//                ->setFrom('zlatintest@gmail.com')
//                ->setTo('zlatintest@gmail.com')
//                ->setBody(
//                  'some text'
//                )
//            ;
//            $mailer->send($message);
//            
//            
            
            //I preffer the traditional way
            $to  = 'zlatintest@gmail.com' ; // note the comma


            // subject
            $subject = 'Contact Request';

            // message
            $message = 'Some test';
           

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
            $headers .= 'To: Symfony Test <zlatintest@gmail.com>' . "\r\n";
            $headers .= 'From: Noreply  <zlatintest@gmail.com>' . "\r\n";
            

            // Mail it
            mail($to, $subject, $message, $headers);
            
            $request->getSession()->getFlashBag()->set('notice', 'Message sent!');

            $data = $request->request->all();

            $em = $this->container->get('doctrine')->getManager();
            $contact = new Contact();

            $contact->setEmail($data['contact']['email']);
               $contact->setMessage($data['contact']['message']);
               $contact->setDate( new \DateTime(date('Y-m-d')) );

            $em->persist($contact);
            $em->flush();
            $em->clear();
            return new RedirectResponse($this->generateUrl('_welcome'));
        }
        return array('form' => $form->createView());
    }
}
