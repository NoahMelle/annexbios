<?php

class __MyTemplates_5bdbc34b911163740cbc081ed4ed5645 extends Mustache_Template
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
        $buffer .= $indent . '      <h2>FILMLADDER</h2>
';
        $buffer .= $indent . '      <p class="hero-text">Alle films die binnenkort spelen</p>
';
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '    <a href="';
        $value = $this->resolveValue($context->find('base_url'), $context);
        $buffer .= ($value === null ? '' : call_user_func($this->mustache->getEscape(), $value));
        $buffer .= 'filmladder/toevoegen" class="hero-view-locations">
';
        $buffer .= $indent . '      VOEG NIEUWE TOE
';
        $buffer .= $indent . '    </a>
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
        $buffer .= $this->section6cd204e5237c7b87321a8c16c037ab18($context, $indent, $value);
        $buffer .= $indent . '    </div>
';
        $buffer .= $indent . '  </div>
';
        $buffer .= $indent . '</main>
';

        return $buffer;
    }

    private function sectionE72d8cc458681ee942e5c7160ca56d78(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                class="star empty">
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
                $buffer .= $indent . '                class="star empty">
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

    private function section84281b7ecdf3c7ae93e821037bc74266(Mustache_Context $context, $indent, $value)
    {
        $buffer = '';
    
        if (is_object($value) && is_callable($value)) {
            $source = '
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                class="star filled">
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
                $buffer .= $indent . '                class="star filled">
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

    private function section6cd204e5237c7b87321a8c16c037ab18(Mustache_Context $context, $indent, $value)
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
                class="star empty">
                <path data-name="Path 87"
                  d="M15.628,8.025l7.823,1.364-5.837,5.383,1.124,7.847L11.8,18.742,4.671,22.235l1.579-7.8L.7,8.743,8.595,7.81,12.327.8Z"
                  transform="translate(0.049 -0.007)" fill="#fff" stroke="#666" stroke-width="0.703" />
              </svg>
              {{/ stars}}
            </div>
            <div class="stars filled">
              {{# stars}}
              <svg xmlns="http://www.w3.org/2000/svg" width="24.262" height="23.264" viewBox="0 0 24.262 23.264"
                class="star filled">
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
                $buffer .= $this->sectionE72d8cc458681ee942e5c7160ca56d78($context, $indent, $value);
                $buffer .= $indent . '            </div>
';
                $buffer .= $indent . '            <div class="stars filled">
';
                $value = $context->find('stars');
                $buffer .= $this->section84281b7ecdf3c7ae93e821037bc74266($context, $indent, $value);
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

}
