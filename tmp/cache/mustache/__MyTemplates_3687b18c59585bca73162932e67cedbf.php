<?php

class __MyTemplates_3687b18c59585bca73162932e67cedbf extends Mustache_Template
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
        $buffer .= $indent . '      Bekijk Onze Vestigingen
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
