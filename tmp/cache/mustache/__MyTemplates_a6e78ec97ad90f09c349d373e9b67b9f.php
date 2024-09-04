<?php

class __MyTemplates_a6e78ec97ad90f09c349d373e9b67b9f extends Mustache_Template
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
        $buffer .= $indent . '      <h2>FILMLADDER</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Alle films die binnenkort spelen</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'filmladder/toevoegen" class="hero-view-locations">
';
        $buffer .= $indent . '      VOEG NIEUWE TOE
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="playing-movies">
';
        $buffer .= $indent . '    <div class="playing-movie">
';
        $buffer .= $indent . '      <div class="rm-img-container skeleton"></div>
';
        $buffer .= $indent . '      <div class="rm-details">
';
        $buffer .= $indent . '        <div class="rm-title-container skeleton">
';
        $buffer .= $indent . '          <h3 class="rm-title"></h3>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="rm-rating skeleton">
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="rm-release-date skeleton"></div>
';
        $buffer .= $indent . '        <div class="rm-description skeleton"></div>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }
}
