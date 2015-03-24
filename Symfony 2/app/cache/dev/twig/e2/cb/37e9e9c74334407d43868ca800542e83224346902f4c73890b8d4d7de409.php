<?php

/* AcmeDemoBundle:Home:about.html.twig */
class __TwigTemplate_e2cb37e9e9c74334407d43868ca800542e83224346902f4c73890b8d4d7de409 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AcmeDemoBundle::layout.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AcmeDemoBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " About us";
    }

    // line 5
    public function block_content_header($context, array $blocks = array())
    {
        echo "";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context["version"] = ((twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MAJOR_VERSION") . ".") . twig_constant("Symfony\\Component\\HttpKernel\\Kernel::MINOR_VERSION"));
        // line 9
        echo "
    <h1 class=\"title\">About us</h1>
     <div class=\"symfony-blocks-welcome\">
        ";
        // line 12
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "dev")) {
            // line 14
            echo "                ";
            // line 17
            echo "                <a href=\"/\" class=\"sf-button sf-button-selected\">
                    <span class=\"border-l\">
                        <span class=\"border-r\">
                            <span class=\"btn-bg\">Home</span>
                        </span>
                    </span>
                </a>
";
            // line 25
            echo "        ";
        }
        // line 26
        echo "        ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment", array()) == "dev")) {
            // line 28
            echo "                ";
            // line 31
            echo "                <a href=\"/about\" class=\"sf-button sf-button-selected\">
                    <span class=\"border-l\">
                        <span class=\"border-r\">
                            <span class=\"btn-bg\">About us</span>
                        </span>
                    </span>
                </a>
";
            // line 39
            echo "        ";
        }
        // line 41
        echo "            ";
        // line 44
        echo "            <a href=\"";
        echo $this->env->getExtension('routing')->getPath("_demo_contact");
        echo "\" class=\"sf-button sf-button-selected\">
                <span class=\"border-l\">
                    <span class=\"border-r\">
                        <span class=\"btn-bg\">Contacts us</span>
                    </span>
                </span>
            </a>
   
            <a href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("_demo_login");
        echo "\" class=\"sf-button sf-button-selected\">
                <span class=\"border-l\">
                    <span class=\"border-r\">
                        <span class=\"btn-bg\">Login</span>
                    </span>
                </span>
            </a>
        </div>
        
        <div> 
            
            
            
            Content
            
            ";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "
            ";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["content"]) ? $context["content"] : $this->getContext($context, "content")), "html", null, true);
        echo "
            
            
            
        </div>


";
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Home:about.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 68,  126 => 67,  108 => 52,  96 => 44,  94 => 41,  91 => 39,  82 => 31,  80 => 28,  77 => 26,  74 => 25,  65 => 17,  63 => 14,  61 => 12,  56 => 9,  53 => 8,  50 => 7,  44 => 5,  38 => 3,  11 => 1,);
    }
}
