<?php

class __MyTemplates_bbedf63d9b4ca766102acb121e5dc01e extends Mustache_Template
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
        $value = $context->find('skeleton-loader-amt');
        $buffer .= $this->section641f0b0614922aeb4befd199d34c59cb($context, $indent, $value);
        $buffer .= $indent . '</main>
';

        return $buffer;
    }

    private function section641f0b0614922aeb4befd199d34c59cb(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
    <div class="playing-movie">
      <div class="rm-img-container skeleton"></div>
      <div class="rm-details">
        <div class="rm-title-container skeleton">
          <h3 class="rm-title"></h3>
        </div>
        <div class="rm-release-date skeleton"></div>
        <div class="rm-description skeleton"></div>
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
                $buffer .= $indent . '        <div class="rm-release-date skeleton"></div>
';
                $buffer .= $indent . '        <div class="rm-description skeleton"></div>
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
