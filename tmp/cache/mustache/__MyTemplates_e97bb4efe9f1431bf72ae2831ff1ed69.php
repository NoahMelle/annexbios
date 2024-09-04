<?php

class __MyTemplates_e97bb4efe9f1431bf72ae2831ff1ed69 extends Mustache_Template
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
        $value = $context->find('skeleton-loader-amt');
        $buffer .= $this->sectionD88220d8328a24ec0fc8b292e25368c4($context, $indent, $value);
        $buffer .= $indent . '
';
        $buffer .= $indent . '            <div id="recommended-movies">
';
        $buffer .= $indent . '
';
        $buffer .= $indent . '            </div>
';
        $buffer .= $indent . '    </main>';

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

    private function sectionD88220d8328a24ec0fc8b292e25368c4(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
            <div class="recommended-movie">
                <div class="recommended-movie-img skeleton"></div>
                <div class="recommended-movie-text skeleton"></div>
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
                
                $buffer .= $indent . '            <div class="recommended-movie">
';
                $buffer .= $indent . '                <div class="recommended-movie-img skeleton"></div>
';
                $buffer .= $indent . '                <div class="recommended-movie-text skeleton"></div>
';
                $buffer .= $indent . '            </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
