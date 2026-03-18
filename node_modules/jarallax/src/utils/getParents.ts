/**
 * Get all parents of the element.
 *
 * @param {Element} elem - DOM element.
 *
 * @returns {Array}
 */
export default function getParents(elem: Element): HTMLElement[] {
  const parents: HTMLElement[] = [];
  let currentElement: Element | null = elem;

  while (currentElement.parentElement !== null) {
    currentElement = currentElement.parentElement;

    if (currentElement.nodeType === 1) {
      parents.push(currentElement as HTMLElement);
    }
  }

  return parents;
}
