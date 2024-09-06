<?php

class __MyTemplates_0713f246250feaf64375ce0b8520c5e5 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<footer class="footer">
';
        $buffer .= $indent . '  <div class="footer-top-wrapper">
';
        $buffer .= $indent . '    <img src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/img/footer/tape.png" alt="" class="tape-overlay">
';
        $buffer .= $indent . '    <div class="footer-top">
';
        $buffer .= $indent . '      <div class="footer-section main">
';
        $buffer .= $indent . '        <img class="footer-logo" src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/img/logo/logo_wit.png" alt="logo">
';
        $buffer .= $indent . '        <div class="footer_tekstcontainer">
';
        $buffer .= $indent . '          <p class="footer_tekst">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla,
';
        $buffer .= $indent . '            accusamus! Facilis culpa excepturi commodi, accusantium laborum voluptas vero quas autem
';
        $buffer .= $indent . '            aliquam suscipit ipsum esse explicabo, veniam nihil eos eum eligendi.</p>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <a href="#" class="read-more">Lees Meer</a>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '      <div class="footer-section">
';
        $buffer .= $indent . '        <div class="footer-heading">
';
        $buffer .= $indent . '          <h2 class="footer-heading">NAVIGEER</h2>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <ul>
';
        $buffer .= $indent . '          <li class="list_item">Werken bij</li>
';
        $buffer .= $indent . '          <li class="list_item">Veelgestelde vragen</li>
';
        $buffer .= $indent . '          <li class="list_item">Vestigingen</li>
';
        $buffer .= $indent . '          <li class="list_item">Contact</li>
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '      <div class="footer-section">
';
        $buffer .= $indent . '        <div class="footer-heading">
';
        $buffer .= $indent . '          <h2 class="footer-heading">VOLG ONS</h2>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <ul class="icons">
';
        $buffer .= $indent . '          <li class="icon"><a href="#"><img src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/icons/facebook.png" alt=""></a></li>
';
        $buffer .= $indent . '          <li class="icon"><a href="#"><img src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/icons/twitter.png" alt=""></a></li>
';
        $buffer .= $indent . '          <li class="icon"><a href="#"><img src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/icons/instagram.png" alt=""></a></li>
';
        $buffer .= $indent . '        </ul>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="legal-row-container">
';
        $buffer .= $indent . '    <div class="legal-row">
';
        $buffer .= $indent . '      <a href="#">Voorwaarden</a> | <a href="#">Privacybeleid</a> | <a href="#">Cookie Disclaimer</a>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</footer>
';
        $value = $context->find('js');
        $buffer .= $this->sectionB1bc670d6b71156c252f9ac4d05bd84f($context, $indent, $value);
        $buffer .= $indent . '<script src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/js/app.js"></script>
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>
';

        return $buffer;
    }

    private function sectionB1bc670d6b71156c252f9ac4d05bd84f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
<script src="{{.}}"></script>
';
            $result = (string) call_user_func($value, $source, $this->lambdaHelper);
            if (strpos($result, '{{') === false) {
                $buffer .= $result;
            } else {
                $buffer .= $this->mustache
                    ->loadLambda($result)
                    ->renderInternal($context);
            }
        } elseif (!empty($value)) {
            $values = $this->isIterable($value) ? $value : array($value);
            foreach ($values as $value) {
                $context->push($value);
                
                $buffer .= $indent . '<script src="';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"></script>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
