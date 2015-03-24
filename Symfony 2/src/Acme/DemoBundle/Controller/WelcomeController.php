<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
     
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
