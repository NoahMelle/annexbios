<?php

class __MyTemplates_977498c56a155f6a37e8e3598b1a7390 extends Mustache_Template
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
        $buffer .= $indent . '      <p class="hero-text">Wijzig locatie/vesteging: ';
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
        $value = $this->resolveValue($context->find('website_link'), $context);
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
        $buffer .= 'vestegingen/wijzig/';
        $value = $this->resolveValue($context->find('current_location_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post">
';
        $buffer .= $indent . '      <label for="function">Functie</label>
';
        $buffer .= $indent . '      <input type="text" name="function" id="function" value="';
        $value = $this->resolveValue($context->find('function'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <label for="city">Stad</label>
';
        $buffer .= $indent . '      <input type="text" name="city" id="city" value="';
        $value = $this->resolveValue($context->find('city'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <label for="address">Address</label>
';
        $buffer .= $indent . '      <input type="text" name="address" id="address" value="';
        $value = $this->resolveValue($context->find('address'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <label for="postal_code">Post code</label>
';
        $buffer .= $indent . '      <input type="text" name="postal_code" id="postal_code" value="';
        $value = $this->resolveValue($context->find('postal_code'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <label for="website_link">Website link</label>
';
        $buffer .= $indent . '      <input type="text" name="website_link" id="website_link" value="';
        $value = $this->resolveValue($context->find('website_link'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <input type="submit" value="toevoegen">
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
