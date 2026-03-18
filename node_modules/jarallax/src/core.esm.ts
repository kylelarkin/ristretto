import jarallaxLib from './core';
import jarallaxElementExt from './deprecated/ext-element';
import jarallaxVideoExt from './ext-video';

export const jarallax = jarallaxLib;

export const jarallaxVideo = function jarallaxVideo(): void {
  jarallaxVideoExt(jarallax);
};

export const jarallaxElement = function jarallaxElement(): void {
  jarallaxElementExt(jarallax);
};
