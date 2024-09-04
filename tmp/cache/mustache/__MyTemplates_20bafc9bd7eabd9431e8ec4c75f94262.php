<?php

class __MyTemplates_20bafc9bd7eabd9431e8ec4c75f94262 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<main class="">
';
        $buffer .= $indent . '  <div class="hero">
';
        $buffer .= $indent . '    <div class="hero-text-container">
';
        $buffer .= $indent . '      <h2>LOCATIES</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Wijzig locatie/vesteging ~';
        $value = $this->resolveValue($context->find('location_name'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'vestegingen/toevoegen" class="hero-view-locations">
';
        $buffer .= $indent . '      VOEG NIEUWE TOE
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="locations">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }
}
