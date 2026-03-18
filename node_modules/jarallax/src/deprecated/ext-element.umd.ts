import domReady from '../utils/ready';
import global from '../utils/global';

import jarallaxElement from './ext-element';

jarallaxElement();

domReady(() => {
  if (typeof global.jarallax !== 'undefined') {
    global.jarallax(document.querySelectorAll('[data-jarallax-element]') as never);
  }
});

export default jarallaxElement;
