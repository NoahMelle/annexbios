<?php

class __MyTemplates_6db7c428b00327d53d8d84241318e315 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<main class="">
';
        $buffer .= $indent . '  <form action="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'log-in" method="post">
';
        $buffer .= $indent . '    <label for="username">gebruikersnaam</label>
';
        $buffer .= $indent . '    <input type="text" name="username" id="username" required>
';
        $buffer .= $indent . '    <label for="password">wachtwoord</label>
';
        $buffer .= $indent . '    <input type="password" name="password" id="password" required>
';
        $buffer .= $indent . '  </form>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }
}
