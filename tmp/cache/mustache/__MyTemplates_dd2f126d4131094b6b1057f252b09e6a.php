<?php

class __MyTemplates_dd2f126d4131094b6b1057f252b09e6a extends Mustache_Template
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
        $buffer .= $indent . '      <h2>NIEUWE LOCATIE</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Voeg een nieuwe locaties/vesteging toe</p>
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
        $buffer .= 'cms/vestigingen/toevoegen" method="post">
';
        $buffer .= $indent . '      <label for="function">Functie</label>
';
        $buffer .= $indent . '      <select name="function" id="function">
';
        $value = $context->find('functions');
        $buffer .= $this->sectionB2bb87c885e984aaf2e9ea56d78f08af($context, $indent, $value);
        $buffer .= $indent . '      </select>
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

    private function sectionB2bb87c885e984aaf2e9ea56d78f08af(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
        <option value="{{ function_id }}">{{ name }}</option>
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
                $buffer .= '">';
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
