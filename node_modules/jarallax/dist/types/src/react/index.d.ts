import { type HTMLAttributes, type ImgHTMLAttributes, type ReactNode } from 'react';
import type { DisableOption, JarallaxOptions } from '../types';
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
export interface JarallaxImageProps extends ImgHTMLAttributes<HTMLImageElement> {
}
export interface JarallaxVideoProps extends JarallaxProps {
    videoSrc: string;
}
export declare function useJarallax<T extends HTMLElement = HTMLElement>(config?: UseJarallaxConfig): import("react").RefObject<T | null>;
export declare function useJarallaxVideo<T extends HTMLElement = HTMLElement>(config?: UseJarallaxConfig): import("react").RefObject<T | null>;
export declare const Jarallax: import("react").ForwardRefExoticComponent<JarallaxProps & import("react").RefAttributes<HTMLElement>>;
export declare const JarallaxVideo: import("react").ForwardRefExoticComponent<JarallaxVideoProps & import("react").RefAttributes<HTMLElement>>;
export declare const JarallaxImage: import("react").ForwardRefExoticComponent<JarallaxImageProps & import("react").RefAttributes<HTMLImageElement>>;
export {};
//# sourceMappingURL=index.d.ts.map