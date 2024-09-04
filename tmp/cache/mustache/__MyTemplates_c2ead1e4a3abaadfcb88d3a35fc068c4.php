<?php

class __MyTemplates_c2ead1e4a3abaadfcb88d3a35fc068c4 extends Mustache_Template
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
        $buffer .= $indent . '  <div class="locations">
';
        $buffer .= $indent . '    <form action="">
';
        $buffer .= $indent . '      <input type="text" name="stad" id="stad">
';
        $buffer .= $indent . '      <input type="text" name="address" id="address">
';
        $buffer .= $indent . '      <input type="text" name="post_code" id="post_code">
';
        $buffer .= $indent . '      <input type="text" name="website_link" id="website_link">
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
