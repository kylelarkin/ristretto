import {
  createElement,
  forwardRef,
  useEffect,
  useRef,
  type CSSProperties,
  type ForwardedRef,
  type HTMLAttributes,
  type ImgHTMLAttributes,
  type ReactNode,
} from 'react';

import { jarallax, jarallaxVideo } from '../core.esm';
import type { DisableOption, JarallaxItem, JarallaxOptions } from '../types';

type JarallaxTag = keyof HTMLElementTagNameMap;

export interface UseJarallaxConfig {
  options?: JarallaxOptions;
  imgElement?: JarallaxOptions['imgElement'];
  videoSrc?: string | null;
  keepImg?: boolean;
  disableParallax?: DisableOption;
  disableVideo?: DisableOption;
}

export interface JarallaxProps extends HTMLAttributes<HTMLElement> {
  as?: JarallaxTag;
  children?: ReactNode;
  options?: JarallaxOptions;
  imgElement?: JarallaxOptions['imgElement'];
  videoSrc?: string | null;
  keepImg?: boolean;
  disableParallax?: DisableOption;
  disableVideo?: DisableOption;
}

export interface JarallaxImageProps extends ImgHTMLAttributes<HTMLImageElement> {}

export interface JarallaxVideoProps extends JarallaxProps {
  videoSrc: string;
}

const JARALLAX_REACT_STYLE_ATTRIBUTE = 'data-jarallax-react-styles';
const JARALLAX_REACT_STYLE_TEXT = [
  '.jarallax {',
  '  position: relative;',
  '  z-index: 0;',
  '}',
  '.jarallax > .jarallax-img,',
  'picture.jarallax-img img {',
  '  position: absolute;',
  '  object-fit: cover;',
  '  top: 0;',
  '  left: 0;',
  '  width: 100%;',
  '  height: 100%;',
  '  z-index: -1;',
  '}',
].join('\n');

let hasRegisteredVideoExtension = false;

function ensureVideoExtension(): void {
  if (hasRegisteredVideoExtension) {
    return;
  }

  jarallaxVideo();
  hasRegisteredVideoExtension = true;
}

function assignRef<T>(ref: ForwardedRef<T>, value: T | null): void {
  if (!ref) {
    return;
  }

  if (typeof ref === 'function') {
    ref(value);
    return;
  }

  ref.current = value;
}

function joinClassNames(...classNames: Array<string | undefined>): string {
  return classNames.filter(Boolean).join(' ');
}

function ensureJarallaxStyles(): void {
  if (typeof document === 'undefined') {
    return;
  }

  if (document.head?.querySelector(`[${JARALLAX_REACT_STYLE_ATTRIBUTE}]`)) {
    return;
  }

  const styleElement = document.createElement('style');
  styleElement.setAttribute(JARALLAX_REACT_STYLE_ATTRIBUTE, 'true');
  styleElement.textContent = JARALLAX_REACT_STYLE_TEXT;
  document.head?.appendChild(styleElement);
}

function createJarallaxRootStyle(style: CSSProperties | undefined): CSSProperties {
  const nextStyle = {
    ...(style || {}),
  };

  if (typeof nextStyle.position === 'undefined') {
    nextStyle.position = 'relative';
  }

  if (typeof nextStyle.zIndex === 'undefined') {
    nextStyle.zIndex = 0;
  }

  return nextStyle;
}

function createJarallaxImageStyle(style: CSSProperties | undefined): CSSProperties {
  const nextStyle = {
    ...(style || {}),
  };

  if (typeof nextStyle.position === 'undefined') {
    nextStyle.position = 'absolute';
  }

  if (typeof nextStyle.objectFit === 'undefined') {
    nextStyle.objectFit = 'cover';
  }

  if (typeof nextStyle.top === 'undefined') {
    nextStyle.top = 0;
  }

  if (typeof nextStyle.left === 'undefined') {
    nextStyle.left = 0;
  }

  if (typeof nextStyle.width === 'undefined') {
    nextStyle.width = '100%';
  }

  if (typeof nextStyle.height === 'undefined') {
    nextStyle.height = '100%';
  }

  if (typeof nextStyle.zIndex === 'undefined') {
    nextStyle.zIndex = -1;
  }

  return nextStyle;
}

function createJarallaxOptions({
  options,
  imgElement,
  videoSrc,
  keepImg,
  disableParallax,
  disableVideo,
}: UseJarallaxConfig): JarallaxOptions {
  const nextOptions: JarallaxOptions = {
    ...(options || {}),
  };

  if (typeof imgElement !== 'undefined') {
    nextOptions.imgElement = imgElement;
  }

  if (typeof videoSrc !== 'undefined') {
    nextOptions.videoSrc = videoSrc;
  }

  if (typeof keepImg !== 'undefined') {
    nextOptions.keepImg = keepImg;
  }

  if (typeof disableParallax !== 'undefined') {
    nextOptions.disableParallax = disableParallax;
  }

  if (typeof disableVideo !== 'undefined') {
    nextOptions.disableVideo = disableVideo;
  }

  return nextOptions;
}

function areOptionsEqual(
  previousOptions: JarallaxOptions | null,
  nextOptions: JarallaxOptions
): boolean {
  if (!previousOptions) {
    return false;
  }

  const previousKeys = Object.keys(previousOptions);
  const nextKeys = Object.keys(nextOptions);

  if (previousKeys.length !== nextKeys.length) {
    return false;
  }

  return nextKeys.every(
    (key) =>
      previousOptions[key as keyof JarallaxOptions] === nextOptions[key as keyof JarallaxOptions]
  );
}

function destroyJarallax(element: JarallaxItem | null): void {
  if (!element?.jarallax) {
    return;
  }

  jarallax(element, 'destroy');
}

function useJarallaxController<T extends HTMLElement>(
  config: UseJarallaxConfig = {},
  useVideoExtension = false
) {
  const elementRef = useRef<T | null>(null);
  const activeElementRef = useRef<JarallaxItem | null>(null);
  const optionsRef = useRef<JarallaxOptions | null>(null);
  const normalizedOptions = createJarallaxOptions(config);

  useEffect(() => {
    const nextElement = elementRef.current as JarallaxItem | null;
    const previousElement = activeElementRef.current;

    if (previousElement && previousElement !== nextElement) {
      destroyJarallax(previousElement);
      optionsRef.current = null;
    }

    if (!nextElement) {
      activeElementRef.current = null;
      return;
    }

    activeElementRef.current = nextElement;
    ensureJarallaxStyles();

    if (useVideoExtension || normalizedOptions.videoSrc) {
      ensureVideoExtension();
    }

    if (!nextElement.jarallax) {
      jarallax(nextElement, normalizedOptions);
      optionsRef.current = normalizedOptions;
      return;
    }

    if (areOptionsEqual(optionsRef.current, normalizedOptions)) {
      return;
    }

    destroyJarallax(nextElement);
    jarallax(nextElement, normalizedOptions);
    optionsRef.current = normalizedOptions;
  });

  useEffect(() => {
    return () => {
      destroyJarallax(activeElementRef.current);
      activeElementRef.current = null;
      optionsRef.current = null;
    };
  }, []);

  return elementRef;
}

export function useJarallax<T extends HTMLElement = HTMLElement>(config: UseJarallaxConfig = {}) {
  return useJarallaxController<T>(config);
}

export function useJarallaxVideo<T extends HTMLElement = HTMLElement>(
  config: UseJarallaxConfig = {}
) {
  return useJarallaxController<T>(config, true);
}

export const Jarallax = forwardRef<HTMLElement, JarallaxProps>(function Jarallax(
  {
    as = 'div',
    className,
    children,
    options,
    imgElement,
    videoSrc,
    keepImg,
    disableParallax,
    disableVideo,
    style,
    ...restProps
  }: JarallaxProps,
  forwardedRef: ForwardedRef<HTMLElement>
) {
  const localRef = useJarallax<HTMLElement>({
    options,
    imgElement,
    videoSrc,
    keepImg,
    disableParallax,
    disableVideo,
  });

  return createElement(
    as,
    {
      ...restProps,
      className: joinClassNames('jarallax', className),
      style: createJarallaxRootStyle(style),
      ref: (value: HTMLElement | null) => {
        localRef.current = value;
        assignRef(forwardedRef, value);
      },
    },
    children
  );
});

export const JarallaxVideo = forwardRef<HTMLElement, JarallaxVideoProps>(function JarallaxVideo(
  {
    as = 'div',
    className,
    children,
    options,
    imgElement,
    videoSrc,
    keepImg,
    disableParallax,
    disableVideo,
    style,
    ...restProps
  }: JarallaxVideoProps,
  forwardedRef: ForwardedRef<HTMLElement>
) {
  const localRef = useJarallaxVideo<HTMLElement>({
    options,
    imgElement,
    videoSrc,
    keepImg,
    disableParallax,
    disableVideo,
  });

  return createElement(
    as,
    {
      ...restProps,
      className: joinClassNames('jarallax', className),
      style: createJarallaxRootStyle(style),
      ref: (value: HTMLElement | null) => {
        localRef.current = value;
        assignRef(forwardedRef, value);
      },
    },
    children
  );
});

export const JarallaxImage = forwardRef<HTMLImageElement, JarallaxImageProps>(
  function JarallaxImage({ className, style, ...imageProps }: JarallaxImageProps, forwardedRef) {
    return createElement('img', {
      ...imageProps,
      className: joinClassNames('jarallax-img', className),
      style: createJarallaxImageStyle(style),
      ref: forwardedRef,
    });
  }
);

Jarallax.displayName = 'Jarallax';
JarallaxImage.displayName = 'JarallaxImage';
JarallaxVideo.displayName = 'JarallaxVideo';
