<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




use Acme\DemoBundle\Form\ContactType;



/**
 * @Route("/demo/secured")
 */
class SecuredController extends Controller
{
    /**
     * @Route("/login", name="_demo_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="_demo_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/hello", defaults={"name"="World"}),
     * @Route("/hello/{name}", name="_demo_secured_hello")
     * @Template()
     */
    public function helloAction()
    {
        
        if( $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY') ){
               
        //Get data 
         $page = $this->getDoctrine()
                ->getRepository('AcmeDemoBundle:Page');
           $data =   $page->findAll() ;

            if (!$page) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
      
            
          $contact = $this->getDoctrine()
                ->getRepository('AcmeDemoBundle:Contact');
            
            //yes it is authenticated
          return   $this->render('AcmeDemoBundle:Site:edit.html.twig' , 
                  array('data'=>$data ,
                        'contact'=>$contact->findAll()
                            
                        )) ;
        }else{
            
            //no it is guest
          return   $this->render('AcmeDemoBundle:Secured:login.html.twig');
        }

    }

    /**
     * @Route("/hello/admin/{name}", name="_demo_secured_hello_admin")
     * @Security("is_granted('ROLE_ADMIN')")
     * @Template()
     */
    public function helloadminAction($name)
    {
        return array('name' => $name);
    }
    
    
    /**
     * @Route("/hello/admin/edit{name}", name="_demo_secured_hello_admin_edit")
     * 
     * @Template()
     */
    public function editAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
         


        
        foreach($request->request->all() as $key=>$val){
            $page = $em->getRepository('AcmeDemoBundle:Page')->find($key);

            if (!$page) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }


            $page->setText($val);
            $em->flush();

        }
          
        
        //render home view
        
         //Get data 
         $page = $this->getDoctrine()
                ->getRepository('AcmeDemoBundle:Page');
           $data =   $page->findBy( 
                        array('page'=>'home')
                     ) ;

            if (!$page) {
                throw $this->createNotFoundException(
                    'No product found for id '.$id
                );
            }
            $title = '';
            $content = '';
            
            foreach($data as $k=>$v){
                if($v->getType() == 1){
                    $title .= $v->getText();
                }else{
                    $content .= $v->getText();
              
                }
            }
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig',
                        array('title'=>$title,'content'=>$content) );
        
        
        
    }                
}
