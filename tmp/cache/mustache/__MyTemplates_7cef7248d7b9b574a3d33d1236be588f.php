<?php

class __MyTemplates_7cef7248d7b9b574a3d33d1236be588f extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '    <main class="">
';
        $buffer .= $indent . '        <div class="hero">
';
        $buffer .= $indent . '            <div class="hero-text-container">
';
        $buffer .= $indent . '                <h2>WELKOM BIJ ANNEXBIOS</h2>
';
        $buffer .= $indent . '                <p class="hero-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit possimus
';
        $buffer .= $indent . '                    eos fugit provident, eius perspiciatis facere veritatis rem <br> nihil nulla ullam nemo iusto fugiat
';
        $buffer .= $indent . '                    excepturi vel velit aspernatur cum recusandae!</p>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '            <a href="/vestigingen" class="hero-view-locations">
';
        $buffer .= $indent . '                Bekijk Onze Vestigingen
';
        $buffer .= $indent . '            </a>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="locations">
';
        $value = $context->find('locations');
        $buffer .= $this->section7561dccd9302f1ae3c54c03488fc174b($context, $indent, $value);
        $buffer .= $indent . '            <div class="location new-locations">
';
        $buffer .= $indent . '                <div class="location-info">
';
        $buffer .= $indent . '                    <h2 class="location-name">Weten waar wij nog meer komen?</h2>
';
        $buffer .= $indent . '                    <p class="location-address">Lorem ipsum dolor sit amet, consectetuer
';
        $buffer .= $indent . '                        adipiscing elit. Aenean commodo ligul.</p>
';
        $buffer .= $indent . '                    <a href="#" class="location-button">Bekijk nieuwe projecten</a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="recommended-movies-container">
';
        $buffer .= $indent . '            <h2>AANBEVOLEN FILMS</h2>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div id="recommended-movies">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '    </main>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '    <footer class="footer">
';
        $buffer .= $indent . '        <div class="footer-top-wrapper">
';
        $buffer .= $indent . '            <img src="./assets/img/footer/tape.png" alt="" class="tape-overlay">
';
        $buffer .= $indent . '            <div class="footer-top">
';
        $buffer .= $indent . '                <div class="footer-section main">
';
        $buffer .= $indent . '                    <img class="footer-logo" src="./assets/img/logo/logo_wit.png" alt="logo">
';
        $buffer .= $indent . '                    <div class="footer_tekstcontainer">
';
        $buffer .= $indent . '                        <p class="footer_tekst">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla,
';
        $buffer .= $indent . '                            accusamus! Facilis culpa excepturi commodi, accusantium laborum voluptas vero quas autem
';
        $buffer .= $indent . '                            aliquam suscipit ipsum esse explicabo, veniam nihil eos eum eligendi.</p>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <a href="#" class="read-more">Lees Meer</a>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="footer-section">
';
        $buffer .= $indent . '                    <div class="footer-heading">
';
        $buffer .= $indent . '                        <h2 class="footer-heading">NAVIGEER</h2>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <ul>
';
        $buffer .= $indent . '                        <li class="list_item">Werken bij</li>
';
        $buffer .= $indent . '                        <li class="list_item">Veelgestelde vragen</li>
';
        $buffer .= $indent . '                        <li class="list_item">Vestigingen</li>
';
        $buffer .= $indent . '                        <li class="list_item">Contact</li>
';
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '                <div class="footer-section">
';
        $buffer .= $indent . '                    <div class="footer-heading">
';
        $buffer .= $indent . '                        <h2 class="footer-heading">VOLG ONS</h2>
';
        $buffer .= $indent . '                    </div>
';
        $buffer .= $indent . '                    <ul class="icons">
';
        $buffer .= $indent . '                        <li class="icon"><a href="#"><img src="./assets/icons/facebook.png" alt=""></a></li>
';
        $buffer .= $indent . '                        <li class="icon"><a href="#"><img src="./assets/icons/twitter.png" alt=""></a></li>
';
        $buffer .= $indent . '                        <li class="icon"><a href="#"><img src="./assets/icons/instagram.png" alt=""></a></li>
';
        $buffer .= $indent . '                    </ul>
';
        $buffer .= $indent . '                </div>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '        <div class="legal-row-container">
';
        $buffer .= $indent . '            <div class="legal-row">
';
        $buffer .= $indent . '                <a href="#">Voorwaarden</a> | <a href="#">Privacybeleid</a> | <a href="#">Cookie Disclaimer</a>
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '        </div>
';
        $buffer .= $indent . '    </footer>
';
        $buffer .= $indent . '    <script src="js/aanbevolenFilms.js"></script>
';
        $buffer .= $indent . '    <script src="./assets/js/app.js"></script>
';
        $buffer .= $indent . '</body>
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '</html>';

        return $buffer;
    }

    private function section7561dccd9302f1ae3c54c03488fc174b(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
            <div class="location">
                <img class="location-image" src="https://placehold.co/600x200" alt="foto van de film">
                <div class="location-info">
                    <h2 class="location-name">{{ city }}</h2>
                    <p class="location-address">{{ address }}</p>
                    <a href="#" class="location-button">Bezoek Website</a>
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
                
                $buffer .= $indent . '            <div class="location">
';
                $buffer .= $indent . '                <img class="location-image" src="https://placehold.co/600x200" alt="foto van de film">
';
                $buffer .= $indent . '                <div class="location-info">
';
                $buffer .= $indent . '                    <h2 class="location-name">';
                $value = $this->resolveValue($context->find('city'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h2>
';
                $buffer .= $indent . '                    <p class="location-address">';
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $buffer .= $indent . '                    <a href="#" class="location-button">Bezoek Website</a>
';
                $buffer .= $indent . '                </div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
