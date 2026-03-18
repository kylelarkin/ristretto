import global from './global';

const mobileAgent = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
  global.navigator?.userAgent ?? ''
);

export default function isMobile(): boolean {
  return mobileAgent;
}
