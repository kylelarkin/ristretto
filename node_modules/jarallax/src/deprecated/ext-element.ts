import global from '../utils/global';
import type { JarallaxInstance, JarallaxStatic } from '../types';

function jarallaxElement(jarallax: JarallaxStatic | undefined = global.jarallax): void {
  // eslint-disable-next-line no-console
  console.warn(
    "Jarallax Element extension is DEPRECATED, please, avoid using it. We recommend you look at something like `lax.js` library <https://github.com/alexfoxy/lax.js>. It is much more powerful and has a less code (in cases when you don't want to add parallax backgrounds)."
  );

  if (typeof jarallax === 'undefined') {
    return;
  }

  const Jarallax = jarallax.constructor;

  // The deprecated element extension historically worked by patching core instance methods in place.
  (
    [
      'initImg',
      'canInitParallax',
      'init',
      'destroy',
      'coverImage',
      'isVisible',
      'onScroll',
      'onResize',
    ] as const
  ).forEach((key) => {
    const def = Jarallax.prototype[key] as (...args: unknown[]) => unknown;

    (Jarallax.prototype as Record<string, unknown>)[key] = function overrideElementMode(
      this: JarallaxInstance,
      ...args: unknown[]
    ): unknown {
      // `data-jarallax-element` is the legacy opt-in that flips an instance into element mode.
      if (key === 'initImg' && this.$item.getAttribute('data-jarallax-element') !== null) {
        this.options.type = 'element';
        this.pureOptions.speed = this.$item.getAttribute('data-jarallax-element') || '100';
      }

      if (this.options.type !== 'element') {
        return def.apply(this, args);
      }

      this.pureOptions.threshold = this.$item.getAttribute('data-threshold') || '';

      switch (key) {
        case 'init': {
          // Element mode encodes X/Y speeds in a single space-separated attribute for backward compatibility.
          const speedArr = `${this.pureOptions.speed}`.split(' ');

          this.options.speed = Number(this.pureOptions.speed || 0);
          this.options.speedY = speedArr[0] ? parseFloat(speedArr[0]) : 0;
          this.options.speedX = speedArr[1] ? parseFloat(speedArr[1]) : 0;

          const thresholdArr = `${this.pureOptions.threshold || ''}`.split(' ');
          this.options.thresholdY = thresholdArr[0] ? parseFloat(thresholdArr[0]) : null;
          this.options.thresholdX = thresholdArr[1] ? parseFloat(thresholdArr[1]) : null;

          def.apply(this, args);

          const originalStylesTag = this.$item.getAttribute('data-jarallax-original-styles');

          if (originalStylesTag) {
            this.$item.setAttribute('style', originalStylesTag);
          }

          return true;
        }
        case 'onResize': {
          // Remove the current transform temporarily so geometry is measured from the unshifted element.
          const defTransform = this.css(this.$item, 'transform');

          this.css(this.$item, { transform: '' });

          const rect = this.$item.getBoundingClientRect();
          const windowData = this.getWindowData();

          this.itemData = {
            width: rect.width,
            height: rect.height,
            y: rect.top + windowData.y,
            x: rect.left,
          };

          this.css(this.$item, { transform: defTransform });
          break;
        }
        case 'onScroll': {
          // Element mode translates the element itself instead of moving a background/image layer.
          const wnd = this.getWindowData();
          const centerPercent =
            (wnd.y + wnd.height / 2 - (this.itemData?.y || 0) - (this.itemData?.height || 0) / 2) /
            (wnd.height / 2);
          const moveY = centerPercent * (this.options.speedY || 0);
          const moveX = centerPercent * (this.options.speedX || 0);
          let my = moveY;
          let mx = moveX;

          if (
            this.options.thresholdY !== null &&
            typeof this.options.thresholdY !== 'undefined' &&
            moveY > this.options.thresholdY
          ) {
            my = 0;
          }

          if (
            this.options.thresholdX !== null &&
            typeof this.options.thresholdX !== 'undefined' &&
            moveX > this.options.thresholdX
          ) {
            mx = 0;
          }

          this.css(this.$item, { transform: `translate3d(${mx}px,${my}px,0)` });
          break;
        }
        case 'initImg':
        case 'isVisible':
        case 'coverImage':
          // These methods are effectively no-ops in element mode but must still report success to core.
          return true;
        default:
          break;
      }

      return def.apply(this, args);
    };
  });
}

export default jarallaxElement;
