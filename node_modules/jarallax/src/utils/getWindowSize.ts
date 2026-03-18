import global from './global';
import domReady from './ready';
import isMobile from './isMobile';

let wndW = 0;
let wndH = 0;
let deviceHelper: HTMLDivElement | null = null;

function hasDocument(): boolean {
  return typeof document !== 'undefined' && typeof document.documentElement !== 'undefined';
}

// Mobile browsers often change the reported viewport height while scrolling.
// Measuring a hidden 100vh helper keeps the parallax geometry stable.
function getDeviceHeight(): number {
  if (!hasDocument()) {
    return global.innerHeight || 0;
  }

  if (!deviceHelper && document.body) {
    deviceHelper = document.createElement('div');
    deviceHelper.style.cssText = 'position: fixed; top: -9999px; left: 0; height: 100vh; width: 0;';
    document.body.appendChild(deviceHelper);
  }

  return (
    (deviceHelper ? deviceHelper.clientHeight : 0) ||
    global.innerHeight ||
    document.documentElement.clientHeight
  );
}

function updateWindowHeight(): void {
  if (!hasDocument()) {
    wndW = global.innerWidth || 0;
    wndH = global.innerHeight || 0;
    return;
  }

  wndW = global.innerWidth || document.documentElement.clientWidth;
  wndH = isMobile()
    ? getDeviceHeight()
    : global.innerHeight || document.documentElement.clientHeight;
}

// Prime the cached viewport size once and then keep it in sync through global events.
updateWindowHeight();
global.addEventListener?.('resize', updateWindowHeight);
global.addEventListener?.('orientationchange', updateWindowHeight);
global.addEventListener?.('load', updateWindowHeight);
domReady(() => {
  updateWindowHeight();
});

export default function getWindowSize(): { width: number; height: number } {
  return {
    width: wndW,
    height: wndH,
  };
}
