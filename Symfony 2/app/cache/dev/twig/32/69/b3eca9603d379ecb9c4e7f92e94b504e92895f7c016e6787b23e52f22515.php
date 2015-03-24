<?php

/* AcmeDemoBundle:Site:edit.html.twig */
class __TwigTemplate_3269b3eca9603d379ecb9c4e7f92e94b504e92895f7c016e6787b23e52f22515 extends Twig_Template
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
        echo " Edit page content ";
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
    ";
        // line 51
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_FULLY")) {
            // line 52
            echo "     <a href=\"";
            echo $this->env->getExtension('routing')->getPath("_demo_logout");
            echo "\" class=\"sf-button sf-button-selected\">
                <span class=\"border-l\">
                    <span class=\"border-r\">
                        <span class=\"btn-bg\">Log out</span>
                    </span>
                </span>
            </a>
";
        } else {
            // line 60
            echo "    NO
";
        }
        // line 62
        echo "           
        </div>
<form method=\"POST\" name=\"site_admin\" id=\"edit_site_form\" action=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("_demo_secured_hello_admin_edit");
        echo "\" >
        ";
        // line 65
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
            echo "   
        <div>
            <div>Page : ";
            // line 67
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "page", array()));
            echo "</div>
            <div>Type :
                ";
            // line 69
            if (($this->getAttribute($context["val"], "type", array()) == 1)) {
                // line 70
                echo "                    Title

                    ";
            } else {
                // line 73
                echo "                        Content
                ";
            }
            // line 75
            echo "            </div>
            <input type=\"text\" name=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "id", array()));
            echo "\" page=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "page", array()));
            echo "\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "text", array()));
            echo "\"></input>
            <hr>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 80
        echo "    <input type=\"submit\" value=\"Edit pages\"/> 
</form>   
        <br>
    <h3>Contacts </h3>
     ";
        // line 84
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["contact"]) ? $context["contact"] : $this->getContext($context, "contact")));
        foreach ($context['_seq'] as $context["_key"] => $context["val"]) {
            echo "   
        <div>  Email : ";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "email", array()));
            echo "     </div>
        <hr>
        <div>  Message : ";
            // line 87
            echo twig_escape_filter($this->env, $this->getAttribute($context["val"], "message", array()));
            echo "     </div>
        <hr>
        <div>  Date : ";
            // line 89
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["val"], "date", array()), "m/d/Y"), "html", null, true);
            echo "     </div><br>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['val'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "AcmeDemoBundle:Site:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 89,  190 => 87,  185 => 85,  179 => 84,  173 => 80,  159 => 76,  156 => 75,  152 => 73,  147 => 70,  145 => 69,  140 => 67,  133 => 65,  129 => 64,  125 => 62,  121 => 60,  109 => 52,  107 => 51,  96 => 44,  94 => 41,  91 => 39,  82 => 31,  80 => 28,  77 => 26,  74 => 25,  65 => 17,  63 => 14,  61 => 12,  56 => 9,  53 => 8,  50 => 7,  44 => 5,  38 => 3,  11 => 1,);
    }
}
