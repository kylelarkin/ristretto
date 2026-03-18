import 'jquery';

import type {
  JarallaxCoverImageData,
  JarallaxItems,
  JarallaxOptions,
  JarallaxStatic,
  JarallaxVoidMethodName,
} from './types';

declare global {
  interface JQuery<TElement = HTMLElement> {
    jarallax(options?: JarallaxOptions): this;
    jarallax(methodName: JarallaxVoidMethodName): this;
    jarallax(methodName: 'isVisible'): boolean | undefined;
    jarallax(methodName: 'coverImage'): JarallaxCoverImageData | true | void;
  }

  interface JQueryStatic {
    readonly fn: JQuery;
  }

  interface Window {
    jarallax?: JarallaxStatic;
    jarallaxVideo?: () => void;
    jarallaxElement?: () => void;
  }
}

export type { JarallaxItems };
