<?php

class __MyTemplates_19094f865cbb773f8367fc298ef1b309 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
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
        $buffer .= 'vestigingen/wijzig/';
        $value = $this->resolveValue($context->find('current_location_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post">
';
        $buffer .= $indent . '      <label for="function">Functie</label>
';
        $buffer .= $indent . '      <select name="function" id="function">
';
        $value = $context->find('functions');
        $buffer .= $this->section841d224f125f8a531cdcd6e4a2d3ac1f($context, $indent, $value);
        $buffer .= $indent . '      </select>
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
        $value = $this->resolveValue($context->find('current_website_link'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <input type="submit" value="wijzig">
';
        $buffer .= $indent . '    </form>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }

    private function section841d224f125f8a531cdcd6e4a2d3ac1f(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
        <option value="{{ function_id }}" {{ selected }}>{{ name }}</option>
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
                
                $buffer .= $indent . '        <option value="';
                $value = $this->resolveValue($context->find('function_id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $value = $this->resolveValue($context->find('selected'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '>';
                $value = $this->resolveValue($context->find('name'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
