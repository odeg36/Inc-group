<?php

/* base.html.twig */
class __TwigTemplate_506d50d266b51347d7306747958eb2512c7a7bc4dfc618389486add58f8fe4df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a2546149fef882ed9d3dfff74d542994e0ec2ac5ef69b5bc0cff59bb4cd16fcd = $this->env->getExtension("native_profiler");
        $__internal_a2546149fef882ed9d3dfff74d542994e0ec2ac5ef69b5bc0cff59bb4cd16fcd->enter($__internal_a2546149fef882ed9d3dfff74d542994e0ec2ac5ef69b5bc0cff59bb4cd16fcd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_a2546149fef882ed9d3dfff74d542994e0ec2ac5ef69b5bc0cff59bb4cd16fcd->leave($__internal_a2546149fef882ed9d3dfff74d542994e0ec2ac5ef69b5bc0cff59bb4cd16fcd_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_05a260562b77c9feaefb8d7c2ef19544916285d7e038584595ef837dc23fbb37 = $this->env->getExtension("native_profiler");
        $__internal_05a260562b77c9feaefb8d7c2ef19544916285d7e038584595ef837dc23fbb37->enter($__internal_05a260562b77c9feaefb8d7c2ef19544916285d7e038584595ef837dc23fbb37_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_05a260562b77c9feaefb8d7c2ef19544916285d7e038584595ef837dc23fbb37->leave($__internal_05a260562b77c9feaefb8d7c2ef19544916285d7e038584595ef837dc23fbb37_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_c283a0719c52f06e820053bc511d6628fdffe99e386b5e68ed10b69a17692c7d = $this->env->getExtension("native_profiler");
        $__internal_c283a0719c52f06e820053bc511d6628fdffe99e386b5e68ed10b69a17692c7d->enter($__internal_c283a0719c52f06e820053bc511d6628fdffe99e386b5e68ed10b69a17692c7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_c283a0719c52f06e820053bc511d6628fdffe99e386b5e68ed10b69a17692c7d->leave($__internal_c283a0719c52f06e820053bc511d6628fdffe99e386b5e68ed10b69a17692c7d_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_bc3c2f2d8fd551aaf4beb1b62d1b4d42743e5cb311f0166e0dda0603c33c80ce = $this->env->getExtension("native_profiler");
        $__internal_bc3c2f2d8fd551aaf4beb1b62d1b4d42743e5cb311f0166e0dda0603c33c80ce->enter($__internal_bc3c2f2d8fd551aaf4beb1b62d1b4d42743e5cb311f0166e0dda0603c33c80ce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_bc3c2f2d8fd551aaf4beb1b62d1b4d42743e5cb311f0166e0dda0603c33c80ce->leave($__internal_bc3c2f2d8fd551aaf4beb1b62d1b4d42743e5cb311f0166e0dda0603c33c80ce_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7bda6a4553740eb107204ea68a63e1b34b8b237cd9aec62f8676e6b4534d738e = $this->env->getExtension("native_profiler");
        $__internal_7bda6a4553740eb107204ea68a63e1b34b8b237cd9aec62f8676e6b4534d738e->enter($__internal_7bda6a4553740eb107204ea68a63e1b34b8b237cd9aec62f8676e6b4534d738e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_7bda6a4553740eb107204ea68a63e1b34b8b237cd9aec62f8676e6b4534d738e->leave($__internal_7bda6a4553740eb107204ea68a63e1b34b8b237cd9aec62f8676e6b4534d738e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
