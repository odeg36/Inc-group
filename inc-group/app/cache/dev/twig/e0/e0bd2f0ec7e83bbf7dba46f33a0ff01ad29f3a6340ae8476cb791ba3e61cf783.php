<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_5a8876be832796a44537e01d50b5b36e236dd2d9bf329164b862f7bdd960c332 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_50602c95ea66c38348cbe0ba5ffff2874b430e2cfc29afe71a4d713ba197b666 = $this->env->getExtension("native_profiler");
        $__internal_50602c95ea66c38348cbe0ba5ffff2874b430e2cfc29afe71a4d713ba197b666->enter($__internal_50602c95ea66c38348cbe0ba5ffff2874b430e2cfc29afe71a4d713ba197b666_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_50602c95ea66c38348cbe0ba5ffff2874b430e2cfc29afe71a4d713ba197b666->leave($__internal_50602c95ea66c38348cbe0ba5ffff2874b430e2cfc29afe71a4d713ba197b666_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_470bca0f852ac6f69cc989b8d68d85cf9dcee405af5c23e0183cd6dea3d7c61d = $this->env->getExtension("native_profiler");
        $__internal_470bca0f852ac6f69cc989b8d68d85cf9dcee405af5c23e0183cd6dea3d7c61d->enter($__internal_470bca0f852ac6f69cc989b8d68d85cf9dcee405af5c23e0183cd6dea3d7c61d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_470bca0f852ac6f69cc989b8d68d85cf9dcee405af5c23e0183cd6dea3d7c61d->leave($__internal_470bca0f852ac6f69cc989b8d68d85cf9dcee405af5c23e0183cd6dea3d7c61d_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_3b8070cb3c6129a4492927465d53ebdb103615aad55ac98be96435b90053fd22 = $this->env->getExtension("native_profiler");
        $__internal_3b8070cb3c6129a4492927465d53ebdb103615aad55ac98be96435b90053fd22->enter($__internal_3b8070cb3c6129a4492927465d53ebdb103615aad55ac98be96435b90053fd22_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_3b8070cb3c6129a4492927465d53ebdb103615aad55ac98be96435b90053fd22->leave($__internal_3b8070cb3c6129a4492927465d53ebdb103615aad55ac98be96435b90053fd22_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_67e25cff3edff13a8567d4d03c3063433e038f5c5c1b2cbd3a59ed2d5f77dfa2 = $this->env->getExtension("native_profiler");
        $__internal_67e25cff3edff13a8567d4d03c3063433e038f5c5c1b2cbd3a59ed2d5f77dfa2->enter($__internal_67e25cff3edff13a8567d4d03c3063433e038f5c5c1b2cbd3a59ed2d5f77dfa2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_67e25cff3edff13a8567d4d03c3063433e038f5c5c1b2cbd3a59ed2d5f77dfa2->leave($__internal_67e25cff3edff13a8567d4d03c3063433e038f5c5c1b2cbd3a59ed2d5f77dfa2_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
