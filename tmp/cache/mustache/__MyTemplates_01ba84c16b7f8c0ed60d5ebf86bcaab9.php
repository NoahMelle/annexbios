<?php

class __MyTemplates_01ba84c16b7f8c0ed60d5ebf86bcaab9 extends Mustache_Template
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
        $buffer .= $indent . '      <h2>VERWIJDER LOCATIES</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Verwijder locatie/vesteging: ';
        $value = $this->resolveValue($context->find('function'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= ' - ';
        $value = $this->resolveValue($context->find('city'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->find('current_website_link'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" class="hero-view-locations">
';
        $buffer .= $indent . '      BEZOEK WEBSITE
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="locations_add">
';
        $buffer .= $indent . '    <form action="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'cms/vestigingen/verwijder/';
        $value = $this->resolveValue($context->find('current_location_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post">
';
        $buffer .= $indent . '      <label>Weet je het zeker? Alle spelende films in deze locatie worden verwijderd...</label>
';
        $buffer .= $indent . '      <input type="hidden" name="location_id" value="';
        $value = $this->resolveValue($context->find('current_location_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <input class="red" type="submit" value="verwijderen">
';
        $buffer .= $indent . '    </form>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }
}
