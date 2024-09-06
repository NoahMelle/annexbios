<?php

class __MyTemplates_88e80c64f18da4da7e91edaacc0684be extends Mustache_Template
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
        $buffer .= $indent . '      <h2>WIJZIG FILM SPEELTIJD</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Wijzig film speeltijd</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="movie_schedule_add skeleton">
';
        $buffer .= $indent . '    <form action="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'cms/filmladder/wijzig/';
        $value = $this->resolveValue($context->find('current_location_movie_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post">
';
        $buffer .= $indent . '      <label for="movie">Film</label>
';
        $buffer .= $indent . '      <select name="movie" id="movie">
';
        $value = $context->find('movies');
        $buffer .= $this->section20d0fbd447e157e27be13f10b897d455($context, $indent, $value);
        $buffer .= $indent . '      </select>
';
        $buffer .= $indent . '      <label for="location">Vestiging</label>
';
        $buffer .= $indent . '      <select name="location" id="location">
';
        $value = $context->find('locations');
        $buffer .= $this->section2ecdcc6870125b930c3933bb97b86f10($context, $indent, $value);
        $buffer .= $indent . '      </select>
';
        $buffer .= $indent . '      <label for="place_data">Plaatsen</label>
';
        $buffer .= $indent . '      <input type="number" name="place_data" id="place_data" value="';
        $value = $this->resolveValue($context->find('place_data_count'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '">
';
        $buffer .= $indent . '      <label for="play_time">Speel moment</label>
';
        $buffer .= $indent . '      <input type="datetime-local" name="play_time" id="play_time" value="';
        $value = $this->resolveValue($context->find('play_time'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" step="1">
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

    private function section20d0fbd447e157e27be13f10b897d455(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
        <option value="{{ movie_id }}" {{ selected }}>{{ title }}</option>
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
                $value = $this->resolveValue($context->find('movie_id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $value = $this->resolveValue($context->find('selected'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '>';
                $value = $this->resolveValue($context->find('title'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section2ecdcc6870125b930c3933bb97b86f10(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
        <option value="{{ location_id }}" {{ selected }}>{{ function }} {{ city }} - {{ address }} {{ postal_code }}
        </option>
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
                $value = $this->resolveValue($context->find('location_id'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" ';
                $value = $this->resolveValue($context->find('selected'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '>';
                $value = $this->resolveValue($context->find('function'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' ';
                $value = $this->resolveValue($context->find('city'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' - ';
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= ' ';
                $value = $this->resolveValue($context->find('postal_code'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '
';
                $buffer .= $indent . '        </option>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
