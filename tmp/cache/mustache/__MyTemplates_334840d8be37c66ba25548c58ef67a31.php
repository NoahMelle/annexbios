<?php

class __MyTemplates_334840d8be37c66ba25548c58ef67a31 extends Mustache_Template
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
        $buffer .= $indent . '      <h2>WELKOM BIJ ANNEXBIOS</h2>
';
        $buffer .= $indent . '      <p class="hero-text">
';
        $buffer .= $indent . '        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit
';
        $buffer .= $indent . '        possimus eos fugit provident, eius perspiciatis facere veritatis rem
';
        $buffer .= $indent . '        <br />
';
        $buffer .= $indent . '        nihil nulla ullam nemo iusto fugiat excepturi vel velit aspernatur cum
';
        $buffer .= $indent . '        recusandae!
';
        $buffer .= $indent . '      </p>
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
        $buffer .= $indent . '  <div class="locations">
';
        $value = $context->find('locations');
        $buffer .= $this->section5c3af14ad35a611e589816cab5990b33($context, $indent, $value);
        $buffer .= $indent . '    <div class="location new-locations">
';
        $buffer .= $indent . '      <div class="location-info">
';
        $buffer .= $indent . '        <h2 class="location-name">Weten waar wij nog meer komen?</h2>
';
        $buffer .= $indent . '        <p class="location-address">
';
        $buffer .= $indent . '          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
';
        $buffer .= $indent . '          commodo ligul.
';
        $buffer .= $indent . '        </p>
';
        $buffer .= $indent . '        <a href="#" class="location-button">Bekijk nieuwe projecten</a>
';
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="recommended-movies-container">
';
        $buffer .= $indent . '    <h2>AANBEVOLEN FILMS</h2>
';
        $buffer .= $indent . '    <div class="recommended-movies-wrapper">
';
        $buffer .= $indent . '      <div class="recommended-movies">
';
        $value = $context->find('skeleton-loader-amt');
        $buffer .= $this->section5e6567ea8b06ace4b1cb2afae59dbeab($context, $indent, $value);
        $buffer .= $indent . '      </div>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }

    private function section5c3af14ad35a611e589816cab5990b33(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
    <div class="location">
      <img
        class="location-image"
        src="https://placehold.co/600x200"
        alt="foto van de film"
      />
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
                
                $buffer .= $indent . '    <div class="location">
';
                $buffer .= $indent . '      <img
';
                $buffer .= $indent . '        class="location-image"
';
                $buffer .= $indent . '        src="https://placehold.co/600x200"
';
                $buffer .= $indent . '        alt="foto van de film"
';
                $buffer .= $indent . '      />
';
                $buffer .= $indent . '      <div class="location-info">
';
                $buffer .= $indent . '        <h2 class="location-name">';
                $value = $this->resolveValue($context->find('city'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</h2>
';
                $buffer .= $indent . '        <p class="location-address">';
                $value = $this->resolveValue($context->find('address'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '</p>
';
                $buffer .= $indent . '        <a href="#" class="location-button">Bezoek Website</a>
';
                $buffer .= $indent . '      </div>
';
                $buffer .= $indent . '    </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section5e6567ea8b06ace4b1cb2afae59dbeab(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
        <div class="recommended-movie">
          <div class="rm-img skeleton"></div>
          <div class="rm-details">
            <div class="rm-title skeleton">
              <h3></h3>
            </div>
            <div class="rm-rating skeleton"></div>
            <div class="rm-release-date skeleton"></div>
            <div class="rm-description skeleton"></div>
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
                
                $buffer .= $indent . '        <div class="recommended-movie">
';
                $buffer .= $indent . '          <div class="rm-img skeleton"></div>
';
                $buffer .= $indent . '          <div class="rm-details">
';
                $buffer .= $indent . '            <div class="rm-title skeleton">
';
                $buffer .= $indent . '              <h3></h3>
';
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '            <div class="rm-rating skeleton"></div>
';
                $buffer .= $indent . '            <div class="rm-release-date skeleton"></div>
';
                $buffer .= $indent . '            <div class="rm-description skeleton"></div>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '        </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
