<?php

/* SensioDistributionBundle:Configurator:form.html.twig */
class __TwigTemplate_04f7a23055579e2f0fd7ebaa8d176ee0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("form_div_layout.html.twig");

        $this->blocks = array(
            'form_rows' => array($this, 'block_form_rows'),
            'form_row' => array($this, 'block_form_row'),
            'form_label' => array($this, 'block_form_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "form_div_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_form_rows($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"symfony-form-errors\">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
    </div>
    ";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "form"));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 8
            echo "        ";
            echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "child"), 'row');
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
    }

    // line 12
    public function block_form_row($context, array $blocks = array())
    {
        // line 13
        echo "    <div class=\"symfony-form-row\">
        ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'label');
        echo "
        <div class=\"symfony-form-field\">
            ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
            <div class=\"symfony-form-errors\">
                ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'errors');
        echo "
            </div>
        </div>
    </div>
";
    }

    // line 24
    public function block_form_label($context, array $blocks = array())
    {
        // line 25
        echo "    ";
        if (twig_test_empty($this->getContext($context, "label"))) {
            // line 26
            echo "        ";
            $context["label"] = $this->env->getExtension('form')->renderer->humanize($this->getContext($context, "name"));
            // line 27
            echo "    ";
        }
        // line 28
        echo "    <label for=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "id"), "html", null, true);
        echo "\">
        ";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getContext($context, "label")), "html", null, true);
        echo "
        ";
        // line 30
        if ($this->getContext($context, "required")) {
            // line 31
            echo "            <span class=\"symfony-form-required\" title=\"This field is required\">*</span>
        ";
        }
        // line 33
        echo "    </label>
";
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 236,  258 => 235,  255 => 234,  784 => 466,  781 => 465,  770 => 463,  766 => 462,  762 => 460,  749 => 459,  723 => 454,  720 => 453,  701 => 451,  684 => 450,  680 => 448,  676 => 447,  672 => 446,  668 => 445,  664 => 444,  660 => 443,  657 => 442,  655 => 441,  638 => 440,  627 => 439,  612 => 434,  607 => 432,  603 => 431,  600 => 430,  586 => 429,  554 => 399,  536 => 396,  519 => 395,  516 => 394,  514 => 393,  509 => 391,  504 => 389,  248 => 136,  177 => 85,  159 => 79,  144 => 72,  135 => 69,  122 => 59,  97 => 43,  386 => 160,  383 => 159,  377 => 158,  375 => 157,  368 => 156,  364 => 155,  360 => 153,  358 => 152,  355 => 151,  352 => 150,  350 => 149,  342 => 147,  340 => 146,  337 => 145,  328 => 140,  325 => 139,  318 => 135,  312 => 131,  309 => 130,  306 => 129,  304 => 128,  290 => 120,  287 => 119,  285 => 118,  278 => 114,  273 => 111,  271 => 110,  266 => 107,  262 => 105,  256 => 103,  252 => 101,  245 => 97,  238 => 219,  232 => 89,  229 => 88,  213 => 79,  205 => 76,  200 => 92,  191 => 68,  188 => 67,  175 => 59,  167 => 82,  105 => 37,  101 => 25,  207 => 77,  174 => 84,  168 => 60,  158 => 59,  88 => 27,  54 => 12,  186 => 87,  183 => 68,  172 => 58,  165 => 64,  162 => 80,  132 => 54,  354 => 163,  345 => 160,  341 => 159,  338 => 158,  333 => 157,  331 => 141,  323 => 138,  321 => 149,  314 => 145,  307 => 141,  300 => 137,  279 => 125,  257 => 109,  250 => 100,  243 => 96,  236 => 218,  212 => 82,  209 => 81,  204 => 78,  201 => 77,  196 => 69,  190 => 72,  180 => 86,  146 => 73,  133 => 47,  126 => 45,  108 => 38,  67 => 18,  111 => 40,  51 => 17,  138 => 42,  95 => 23,  84 => 29,  63 => 17,  47 => 15,  21 => 3,  60 => 14,  38 => 11,  18 => 1,  305 => 102,  299 => 125,  296 => 97,  293 => 121,  291 => 95,  286 => 129,  280 => 115,  277 => 87,  274 => 248,  272 => 121,  267 => 82,  253 => 81,  249 => 79,  234 => 77,  226 => 87,  224 => 86,  219 => 83,  215 => 83,  208 => 68,  202 => 71,  198 => 64,  181 => 63,  164 => 59,  124 => 48,  107 => 42,  80 => 26,  75 => 25,  36 => 5,  156 => 56,  148 => 52,  142 => 51,  140 => 71,  127 => 49,  123 => 44,  115 => 55,  110 => 39,  85 => 26,  65 => 16,  59 => 18,  45 => 9,  103 => 41,  91 => 28,  74 => 17,  70 => 18,  66 => 19,  25 => 5,  89 => 34,  82 => 25,  92 => 33,  86 => 30,  77 => 23,  57 => 13,  19 => 1,  42 => 13,  29 => 6,  26 => 3,  223 => 88,  214 => 90,  210 => 78,  203 => 93,  199 => 83,  194 => 69,  192 => 90,  189 => 70,  187 => 62,  184 => 76,  178 => 72,  170 => 64,  157 => 78,  152 => 75,  145 => 58,  130 => 47,  125 => 52,  119 => 45,  116 => 29,  112 => 43,  102 => 31,  98 => 36,  76 => 24,  73 => 24,  69 => 23,  56 => 14,  32 => 5,  24 => 3,  22 => 2,  23 => 29,  17 => 1,  68 => 13,  61 => 16,  44 => 12,  20 => 2,  161 => 58,  153 => 53,  150 => 49,  147 => 48,  143 => 57,  137 => 45,  129 => 46,  121 => 35,  118 => 50,  113 => 40,  104 => 35,  99 => 33,  94 => 35,  81 => 28,  78 => 32,  72 => 21,  64 => 28,  53 => 13,  50 => 18,  48 => 16,  41 => 7,  39 => 7,  35 => 7,  33 => 4,  30 => 4,  27 => 3,  182 => 70,  176 => 62,  169 => 83,  163 => 54,  160 => 53,  155 => 54,  151 => 62,  149 => 47,  141 => 43,  136 => 55,  134 => 50,  131 => 31,  128 => 39,  120 => 51,  117 => 45,  114 => 31,  109 => 38,  106 => 33,  100 => 30,  96 => 29,  93 => 34,  90 => 31,  87 => 28,  83 => 38,  79 => 24,  71 => 23,  62 => 11,  58 => 20,  55 => 14,  52 => 17,  49 => 11,  46 => 20,  43 => 8,  40 => 8,  37 => 9,  34 => 5,  31 => 4,  28 => 3,);
    }
}
