import VideoWorker from 'video-worker';

import domReady from './utils/ready';
import global from './utils/global';
import jarallaxVideo from './ext-video';

jarallaxVideo();

domReady(() => {
  // Preserve the historical auto-init path for `[data-jarallax-video]` in script-tag usage.
  if (typeof global.jarallax !== 'undefined') {
    global.jarallax(document.querySelectorAll('[data-jarallax-video]') as never);
  }
});

// VideoWorker remains global because downstream projects have historically relied on that side effect.
if (!global.VideoWorker) {
  global.VideoWorker = VideoWorker;
}

export default jarallaxVideo;
