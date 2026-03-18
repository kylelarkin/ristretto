import domReady from './utils/ready';
import global from './utils/global';
import jarallax from './core';
import type { JarallaxItem } from './types';

const $ = global.jQuery as
  | {
      fn: Record<string, unknown>;
      (
        item: JarallaxItem
      ): {
        jarallax?: unknown;
      };
    }
  | undefined;

if (typeof $ !== 'undefined') {
  // UMD keeps the historical jQuery plugin contract alive for script-tag consumers.
  const plugin = function plugin(this: unknown, ...args: unknown[]): unknown {
    Array.prototype.unshift.call(args, this);
    const result = (jarallax as (...jarallaxArgs: unknown[]) => unknown).apply(global, args);

    return typeof result !== 'object' ? result : this;
  } as ((...args: unknown[]) => unknown) & { constructor?: unknown; noConflict?: () => unknown };

  plugin.constructor = jarallax.constructor;

  // noConflict mirrors the old plugin behavior so existing pages can restore a previous implementation.
  const oldPlugin = $.fn.jarallax;
  $.fn.jarallax = plugin;
  plugin.noConflict = function noConflict(): unknown {
    $.fn.jarallax = oldPlugin;
    return this;
  };
}

domReady(() => {
  // The UMD build still supports automatic data-attribute bootstrapping on document ready.
  jarallax(document.querySelectorAll('[data-jarallax]') as unknown as ArrayLike<JarallaxItem>);
});

export default jarallax;
