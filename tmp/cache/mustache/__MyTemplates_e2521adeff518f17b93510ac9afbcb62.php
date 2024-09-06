<?php

class __MyTemplates_e2521adeff518f17b93510ac9afbcb62 extends Mustache_Template
{
    private $lambdaHelper;
    protected $strictCallables = true;

    public function renderInternal(Mustache_Context $context, $indent = '')
    {
        $this->lambdaHelper = new Mustache_LambdaHelper($this->mustache, $context);
        $buffer = '';

        $buffer .= $indent . '<main class="homepage-main">
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
        $buffer .= $this->sectionC908195a8baf1b909f50c75968901c3d($context, $indent, $value);
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
        $buffer .= $this->section1fdad3e1025f2b583bf6d2f9880cfa33($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '  <div class="news-container">
';
        $buffer .= $indent . '    <h2 class="news-header">Nieuws</h2>
';
        $buffer .= $indent . '    <div class="news">
';
        $value = $context->find('news-items');
        $buffer .= $this->sectionBda59b2cca844f9d1589007d3789a603($context, $indent, $value);
        $buffer .= $indent . '      <div class="news-item-template">
';
        $buffer .= $indent . '        <div class="news-image"></div>
';
        $buffer .= $indent . '        <div class="news-info">
';
        $buffer .= $indent . '          <h3 class="news-title"></h3>
';
        $buffer .= $indent . '          <time datetime="" class="news-date"></time>
';
        $buffer .= $indent . '          <p class="news-description"></p>
';
        $buffer .= $indent . '        </div>
';
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

    private function sectionC908195a8baf1b909f50c75968901c3d(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
    <div class="location">
      <img class="location-image" src="{{ base_url }}assets/img/vestigingen/{{ image_path }}"
        alt="foto van de vestiging" />
      <div class="location-info">
        <h2 class="location-name">{{ city }}</h2>
        <p class="location-address">{{ address }}</p>
        <a href="{{ website_link }}" class="location-button">Bezoek Website</a>
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
                $buffer .= $indent . '      <img class="location-image" src="';
                $value = $this->resolveValue($context->find('base_url'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= 'assets/img/vestigingen/';
                $value = $this->resolveValue($context->find('image_path'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '"
';
                $buffer .= $indent . '        alt="foto van de vestiging" />
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
                $buffer .= $indent . '        <a href="';
                $value = $this->resolveValue($context->find('website_link'), $context);
                $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
                $buffer .= '" class="location-button">Bezoek Website</a>
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

    private function sectionD0b85c7eca77a677b8aa3e807e415613(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                aria-label="Empty Star" class="star empty">
                <path data-name="Path 87"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)" fill="#fff" stroke="#666" stroke-width="0.703" />
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
                
                $buffer .= $indent . '              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
';
                $buffer .= $indent . '                aria-label="Empty Star" class="star empty">
';
                $buffer .= $indent . '                <path data-name="Path 87"
';
                $buffer .= $indent . '                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
';
                $buffer .= $indent . '                  transform="translate(0.049 -0.007)" fill="#fff" stroke="#666" stroke-width="0.703" />
';
                $buffer .= $indent . '              </svg>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section61d6f46d26bbbf78d0c0a8605b92c8da(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                class="star filled" aria-label="Filled Star">
                <path data-name="Path 86"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)" fill="#666" stroke="#666" stroke-width="0.703" />
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
                
                $buffer .= $indent . '              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
';
                $buffer .= $indent . '                class="star filled" aria-label="Filled Star">
';
                $buffer .= $indent . '                <path data-name="Path 86"
';
                $buffer .= $indent . '                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
';
                $buffer .= $indent . '                  transform="translate(0.049 -0.007)" fill="#666" stroke="#666" stroke-width="0.703" />
';
                $buffer .= $indent . '              </svg>
';
                $context->pop();
            }
        }
    
        return $buffer;
    }

    private function section1fdad3e1025f2b583bf6d2f9880cfa33(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
      <div class="recommended-movie skeleton">
        <div class="rm-img-container"></div>
        <div class="rm-details">
          <div class="rm-title-container">
            <h3 class="rm-title"></h3>
          </div>
          <div class="rm-rating">
            <div class="stars empty">
              {{# stars}}
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                aria-label="Empty Star" class="star empty">
                <path data-name="Path 87"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)" fill="#fff" stroke="#666" stroke-width="0.703" />
              </svg>
              {{/ stars}}
            </div>
            <div class="stars filled">
              {{# stars}}
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                class="star filled" aria-label="Filled Star">
                <path data-name="Path 86"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)" fill="#666" stroke="#666" stroke-width="0.703" />
              </svg>
              {{/ stars}}
            </div>
          </div>
          <div class="rm-release-date"></div>
          <div class="rm-description-container">
            <p class="rm-description"></p>
          </div>
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
                
                $buffer .= $indent . '      <div class="recommended-movie skeleton">
';
                $buffer .= $indent . '        <div class="rm-img-container"></div>
';
                $buffer .= $indent . '        <div class="rm-details">
';
                $buffer .= $indent . '          <div class="rm-title-container">
';
                $buffer .= $indent . '            <h3 class="rm-title"></h3>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '          <div class="rm-rating">
';
                $buffer .= $indent . '            <div class="stars empty">
';
                $value = $context->find('stars');
                $buffer .= $this->sectionD0b85c7eca77a677b8aa3e807e415613($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '            <div class="stars filled">
';
                $value = $context->find('stars');
                $buffer .= $this->section61d6f46d26bbbf78d0c0a8605b92c8da($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '          <div class="rm-release-date"></div>
';
                $buffer .= $indent . '          <div class="rm-description-container">
';
                $buffer .= $indent . '            <p class="rm-description"></p>
';
                $buffer .= $indent . '          </div>
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

    private function sectionBda59b2cca844f9d1589007d3789a603(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
      <div class="news-item skeleton">
        <div class="news-image"></div>
        <div class="news-info">
          <div class="news-title-container">
            <h3 class="news-title"></h3>
          </div>
          <time datetime="" class="news-date"></time>
          <p class="news-description"></p>
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
                
                $buffer .= $indent . '      <div class="news-item skeleton">
';
                $buffer .= $indent . '        <div class="news-image"></div>
';
                $buffer .= $indent . '        <div class="news-info">
';
                $buffer .= $indent . '          <div class="news-title-container">
';
                $buffer .= $indent . '            <h3 class="news-title"></h3>
';
                $buffer .= $indent . '          </div>
';
                $buffer .= $indent . '          <time datetime="" class="news-date"></time>
';
                $buffer .= $indent . '          <p class="news-description"></p>
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
