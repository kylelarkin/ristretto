import global from './global';

/**
 * Add styles to element or read a computed CSS property.
 */
function css(el: HTMLElement, styles: string): string;
function css(el: HTMLElement, styles: Record<string, string | number>): HTMLElement;
function css(
  el: HTMLElement,
  styles: string | Record<string, string | number>
): string | HTMLElement {
  if (typeof styles === 'string') {
    return global.getComputedStyle(el).getPropertyValue(styles);
  }

  Object.keys(styles).forEach((key) => {
    (el.style as CSSStyleDeclaration & Record<string, string | number | null>)[key] = styles[key];
  });

  return el;
}

export default css;
