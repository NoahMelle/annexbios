<?php

class __MyTemplates_266e1e37f2b620bcf2457af7e720a053 extends Mustache_Template
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
        $buffer .= $indent . '      <h2>LOCATIES</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Alle locaties/vestegingen van AnnexBios</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <a href="/vestigingen" class="hero-view-locations">
';
        $buffer .= $indent . '      VOEG NIEUWE TOE
';
        $buffer .= $indent . '    </a>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }
}
