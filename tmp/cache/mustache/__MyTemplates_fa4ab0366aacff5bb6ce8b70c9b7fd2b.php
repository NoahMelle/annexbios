<?php

class __MyTemplates_fa4ab0366aacff5bb6ce8b70c9b7fd2b extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<!DOCTYPE html>
';
        $buffer .= $indent . '<html lang="en">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<head>
';
        $buffer .= $indent . '  <meta charset="UTF-8">
';
        $buffer .= $indent . '  <meta name="viewport" content="width=device-width, initial-scale=1.0">
';
        $buffer .= $indent . '  <title>';
        $value = $this->resolveValue($context->find('page_title'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '</title>
';
        $buffer .= $indent . '  <link href="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/css/style.css" rel="stylesheet" />
';
        $value = $context->find('styles');
        $buffer .= $this->section26a4a34667c84688c41cfa317edf8125($context, $indent, $value);
        $buffer .= $indent . '</head>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '<body>
';
        $buffer .= $indent . '  <nav class="navbar not-active">
';
        $buffer .= $indent . '    <div class="header-bar-container">
';
        $buffer .= $indent . '      <div class="header-bar-content">
';
        $buffer .= $indent . '        <div class="mobile-top">
';
        $buffer .= $indent . '          <img class="navbar-logo" src="./assets/img/logo/logo_hoofd.png" alt="logo">
';
        $buffer .= $indent . '          <div class="menu-container">
';
        $buffer .= $indent . '            <div class="hamburger-button not-active">
';
        $buffer .= $indent . '              <span class="hamburger-bar bar-top"></span>
';
        $buffer .= $indent . '              <span class="hamburger-bar bar-middle"></span>
';
        $buffer .= $indent . '              <span class="hamburger-bar bar-bottom"></span>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '          </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="nav-links">
';
        $buffer .= $indent . '          <h3 class="kop1">VESTIGINGEN</h3>
';
        $buffer .= $indent . '          <h3 class="kop2">AANBEVOLEN FILMS</h3>
';
        $buffer .= $indent . '          <h3 class="kop3">CONTACT</h3>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="navbar-lower">
';
        $buffer .= $indent . '      <div class="navbar-purchase">KOOP JE TICKETS</div>
';
        $buffer .= $indent . '      <div class="location-group">
';
        $buffer .= $indent . '        <select name="" id="" class="location-selector">
';
        $buffer .= $indent . '          <option value="" disabled selected>Kies je vestiging</option>
';
        $value = $context->find('locations');
        $buffer .= $this->section45f34ef324632df8d77dbb1b3b0e4987($context, $indent, $value);
        $buffer .= $indent . '        </select>
';
        $buffer .= $indent . '        <button class="view-tickets">
';
        $buffer .= $indent . '          Bekijk Tickets
';
        $buffer .= $indent . '        </button>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </nav>
';

        return $buffer;
    }

    private function section26a4a34667c84688c41cfa317edf8125(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
  <link href="{{ base_url }}assets/css/{{.}}" rel="stylesheet" />
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
                
                $buffer .= $indent . '  <link href="';
                $value = $this->resolveValue($context->find('base_url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= 'assets/css/';
                $value = $this->resolveValue($context->last(), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" rel="stylesheet" />
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section45f34ef324632df8d77dbb1b3b0e4987(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
          <option value="">{{ city }}</option>
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
                
                $buffer .= $indent . '          <option value="">';
                $value = $this->resolveValue($context->find('city'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
