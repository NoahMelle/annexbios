<?php

class __MyTemplates_ae4627fff6ed54204cfdf40e854ce310 extends Mustache_Template
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
        $buffer .= $indent . '    <div class="recommended-movies">
';
        $value = $context->find('skeleton-loader-amt');
        $buffer .= $this->section25d7a7e30b8d11b4fff416bacd85f409($context, $indent, $value);
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

    private function sectionCce550a9c5bf62bacc56dcd89f3b1e06(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24.262"
                height="23.264"
                viewBox="0 0 24.262 23.264"
                class="star filled"
              >
                <path
                  data-name="Path 86"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)"
                  fill="#666"
                  stroke="#666"
                  stroke-width="0.703"
                />
              </svg>
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
                
                $buffer .= $indent . '              <svg
';
                $buffer .= $indent . '                xmlns="http://www.w3.org/2000/svg"
';
                $buffer .= $indent . '                width="24.262"
';
                $buffer .= $indent . '                height="23.264"
';
                $buffer .= $indent . '                viewBox="0 0 24.262 23.264"
';
                $buffer .= $indent . '                class="star filled"
';
                $buffer .= $indent . '              >
';
                $buffer .= $indent . '                <path
';
                $buffer .= $indent . '                  data-name="Path 86"
';
                $buffer .= $indent . '                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
';
                $buffer .= $indent . '                  transform="translate(0.049 -0.007)"
';
                $buffer .= $indent . '                  fill="#666"
';
                $buffer .= $indent . '                  stroke="#666"
';
                $buffer .= $indent . '                  stroke-width="0.703"
';
                $buffer .= $indent . '                />
';
                $buffer .= $indent . '              </svg>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function sectionDc8afb7f3cc6eb31aa56b20e71302ef0(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24.262"
                height="23.264"
                viewBox="0 0 24.262 23.264"
                class="star empty"
              >
                <path
                  data-name="Path 87"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)"
                  fill="#fff"
                  stroke="#666"
                  stroke-width="0.703"
                />
              </svg>
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
                
                $buffer .= $indent . '              <svg
';
                $buffer .= $indent . '                xmlns="http://www.w3.org/2000/svg"
';
                $buffer .= $indent . '                width="24.262"
';
                $buffer .= $indent . '                height="23.264"
';
                $buffer .= $indent . '                viewBox="0 0 24.262 23.264"
';
                $buffer .= $indent . '                class="star empty"
';
                $buffer .= $indent . '              >
';
                $buffer .= $indent . '                <path
';
                $buffer .= $indent . '                  data-name="Path 87"
';
                $buffer .= $indent . '                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
';
                $buffer .= $indent . '                  transform="translate(0.049 -0.007)"
';
                $buffer .= $indent . '                  fill="#fff"
';
                $buffer .= $indent . '                  stroke="#666"
';
                $buffer .= $indent . '                  stroke-width="0.703"
';
                $buffer .= $indent . '                />
';
                $buffer .= $indent . '              </svg>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section25d7a7e30b8d11b4fff416bacd85f409(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
      <div class="recommended-movie">
        <div class="rm-img-container skeleton"></div>
        <div class="rm-details">
          <div class="rm-title-container skeleton">
            <h3 class="rm-title"></h3>
          </div>
          <div class="rm-rating skeleton">
            <div class="stars filled">
              {{# stars}}
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24.262"
                height="23.264"
                viewBox="0 0 24.262 23.264"
                class="star filled"
              >
                <path
                  data-name="Path 86"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)"
                  fill="#666"
                  stroke="#666"
                  stroke-width="0.703"
                />
              </svg>
              {{/ stars}}
            </div>
            <div class="stars empty">
              {{# stars}}
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24.262"
                height="23.264"
                viewBox="0 0 24.262 23.264"
                class="star empty"
              >
                <path
                  data-name="Path 87"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)"
                  fill="#fff"
                  stroke="#666"
                  stroke-width="0.703"
                />
              </svg>
              {{/ stars}}
            </div>
          </div>
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
                
                $buffer .= $indent . '      <div class="recommended-movie">
';
                $buffer .= $indent . '        <div class="rm-img-container skeleton"></div>
';
                $buffer .= $indent . '        <div class="rm-details">
';
                $buffer .= $indent . '          <div class="rm-title-container skeleton">
';
                $buffer .= $indent . '            <h3 class="rm-title"></h3>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '          <div class="rm-rating skeleton">
';
                $buffer .= $indent . '            <div class="stars filled">
';
                $value = $context->find('stars');
                $buffer .= $this->sectionCce550a9c5bf62bacc56dcd89f3b1e06($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '            <div class="stars empty">
';
                $value = $context->find('stars');
                $buffer .= $this->sectionDc8afb7f3cc6eb31aa56b20e71302ef0($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '          <div class="rm-release-date skeleton"></div>
';
                $buffer .= $indent . '          <div class="rm-description skeleton"></div>
';
                $buffer .= $indent . '        </div>
';
                $buffer .= $indent . '      </div>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

}
