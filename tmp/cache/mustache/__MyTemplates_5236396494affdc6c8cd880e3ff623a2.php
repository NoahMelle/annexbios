<?php

class __MyTemplates_5236396494affdc6c8cd880e3ff623a2 extends Mustache_Template
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
        $buffer .= $indent . '      <h2>NIEUWE LOCATIE</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Voeg een nieuwe locaties/vestegingen toe</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="locations_add">
';
        $buffer .= $indent . '    <form action="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'vestegingen/toevoegen" method="post">
';
        $buffer .= $indent . '      <label for="city">Stad</label>
';
        $buffer .= $indent . '      <input type="text" name="city" id="city">
';
        $buffer .= $indent . '      <label for="address">Address</label>
';
        $buffer .= $indent . '      <input type="text" name="address" id="address">
';
        $buffer .= $indent . '      <label for="postal_code">Post code</label>
';
        $buffer .= $indent . '      <input type="text" name="postal_code" id="postal_code">
';
        $buffer .= $indent . '      <label for="website_link">Website link</label>
';
        $buffer .= $indent . '      <input type="text" name="website_link" id="website_link">
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
