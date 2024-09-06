<?php

class __MyTemplates_38aabb706cea0978598491ca2ba54e5e extends Mustache_Template
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
        $buffer .= $indent . '      <p class="hero-text">Alle locaties/vestegingen van AnnexBios</p>
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
        $value = $context->find('locations');
        $buffer .= $this->section2a0facdf3c56c5607a03cb7f9634e2b8($context, $indent, $value);
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }

    private function section2a0facdf3c56c5607a03cb7f9634e2b8(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
    <div class="location">
      <div class="location-info">
        <h2 class="location-name">{{ city }}</h2>
        <p class="location-address">~ {{ address }}</p>
        <a href="{{ website_link }}" class="location-button">Bezoek Website</a>
        <a href="{{ base_url }}vestegingen/wijzig/{{ location_id }}" class="location-button">Wijzig Vesteging</a>
        <a href="{{ base_url }}vestegingen/verwijder{{ location_id }}" class="location-button red">Verwijder
          Vesteging</a>
      </div>
    </div>
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
                
                $buffer .= $indent . '    <div class="location">
';
                $buffer .= $indent . '      <div class="location-info">
';
                $buffer .= $indent . '        <h2 class="location-name">';
                $value = $this->resolveValue($context->find('city'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h2>
';
                $buffer .= $indent . '        <p class="location-address">~ ';
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $buffer .= $indent . '        <a href="';
                $value = $this->resolveValue($context->find('website_link'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="location-button">Bezoek Website</a>
';
                $buffer .= $indent . '        <a href="';
                $value = $this->resolveValue($context->find('base_url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= 'vestegingen/wijzig/';
                $value = $this->resolveValue($context->find('location_id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="location-button">Wijzig Vesteging</a>
';
                $buffer .= $indent . '        <a href="';
                $value = $this->resolveValue($context->find('base_url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= 'vestegingen/verwijder';
                $value = $this->resolveValue($context->find('location_id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="location-button red">Verwijder
';
                $buffer .= $indent . '          Vesteging</a>
';
                $buffer .= $indent . '      </div>
';
                $buffer .= $indent . '    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
