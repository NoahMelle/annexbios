<?php

class __MyTemplates_efe3140e1e8ca5154d13e027cb176662 extends Mustache_Template
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
        $buffer .= $indent . '
';
        $buffer .= $indent . '  <script>
';
        $buffer .= $indent . '    const BASEURL = \'';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '\';
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '  </script>
';
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
        $buffer .= $indent . '          <img class="navbar-logo" src="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'assets/img/logo/logo_hoofd.png" alt="logo">
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
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '        <div class="navbar-lower">
';
        $buffer .= $indent . '            <div class="navbar-purchase">KOOP JE TICKETS</div>
';
        $buffer .= $indent . '            <div class="location-group">
';
        $buffer .= $indent . '                <select name="location" id="location-selector" class="location-selector" aria-label="Selecteer een vestiging">
';
        $buffer .= $indent . '                    <option value="#" disabled selected hidden>Kies je vestiging</option>
';
        $value = $context->find('locations');
        $buffer .= $this->sectionF618729e1394851925f04740bd76f08a($context, $indent, $value);
        $buffer .= $indent . '                </select>
';
        $buffer .= $indent . '                <a class="view-tickets" id="view-tickets" href="#" target="_blank">
';
        $buffer .= $indent . '                    Bekijk Tickets
';
        $buffer .= $indent . '                </a>
';
        $buffer .= $indent . '            </div>
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

    private function sectionF618729e1394851925f04740bd76f08a(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
                    <option value="{{ url }}">{{ city }}</option>
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
                
                $buffer .= $indent . '                    <option value="';
                $value = $this->resolveValue($context->find('url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '">';
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
