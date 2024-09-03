<?php

class __MyTemplates_b82826bc0cda5f4f15e50d4127a33e13 extends Mustache_Template
{
    protected $strictCallables = true;
    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $buffer = '';

        $buffer .= $indent . '<nav class="navbar not-active">
';
        $buffer .= $indent . '    <div class="header-bar-container">
';
        $buffer .= $indent . '        <div class="header-bar-content">
';
        $buffer .= $indent . '            <div class="mobile-top">
';
        $buffer .= $indent . '                <img class="navbar-logo" src="./assets/img/logo/logo_hoofd.png" alt="logo">
';
        $buffer .= $indent . '                <div class="menu-container">
';
        $buffer .= $indent . '                    <div class="hamburger-button not-active">
';
        $buffer .= $indent . '                        <span class="hamburger-bar bar-top"></span>
';
        $buffer .= $indent . '                        <span class="hamburger-bar bar-middle"></span>
';
        $buffer .= $indent . '                        <span class="hamburger-bar bar-bottom"></span>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <div class="nav-links">
';
        $buffer .= $indent . '                <h3 class="kop1">VESTIGINGEN</h3>
';
        $buffer .= $indent . '                <h3 class="kop2">AANBEVOLEN FILMS</h3>
';
        $buffer .= $indent . '                <h3 class="kop3">CONTACT</h3>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <div class="navbar-lower">
';
        $buffer .= $indent . '        <div class="navbar-purchase">KOOP JE TICKETS</div>
';
        $buffer .= $indent . '        <div class="location-group">
';
        $buffer .= $indent . '            <select name="" id="" class="location-selector">
';
        $buffer .= $indent . '                <option value="" disabled selected>Kies je vestiging</option>
';
        $buffer .= $indent . '                <?php foreach ($locations as $location) : ?>
';
        $buffer .= $indent . '                <option value=""><?= $location ?></option>
';
        $buffer .= $indent . '                <?php endforeach; ?>
';
        $buffer .= $indent . '            </select>
';
        $buffer .= $indent . '            <button class="view-tickets">
';
        $buffer .= $indent . '                Bekijk Tickets
';
        $buffer .= $indent . '            </button>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '</nav>';

        return $buffer;
    }
}
