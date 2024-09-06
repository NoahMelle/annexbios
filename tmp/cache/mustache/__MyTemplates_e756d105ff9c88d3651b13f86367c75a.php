<?php

class __MyTemplates_e756d105ff9c88d3651b13f86367c75a extends Mustache_Template
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
        $buffer .= $indent . '      <h2>VERWIJDER FILM SPEELTIJD</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Verwijder film speeltijd</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="movie_schedule_add">
';
        $buffer .= $indent . '    <form action="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'filmladder/verwijder/';
        $value = $this->resolveValue($context->find('current_location_movie_id'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= '" method="post">
';
        $buffer .= $indent . '      <label>Weet je het zeker?</label>
';
        $buffer .= $indent . '      <input type="hidden" name="current_location_id" value="';
        $value = $this->resolveValue($context->find('current_location_movie_id'), $context);
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
