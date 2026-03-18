/**
 * Document ready callback.
 * @param {Function} callback - callback will be fired once Document ready.
 */
export default function ready(callback: () => void): void {
  if (typeof document === 'undefined') {
    return;
  }

  if (document.readyState === 'complete' || document.readyState === 'interactive') {
    // Already ready or interactive, execute callback
    callback();
  } else {
    document.addEventListener('DOMContentLoaded', callback, {
      capture: true,
      once: true,
      passive: true,
    });
  }
}
