import type { GlobalLike } from '../types';

let win: GlobalLike;

if (typeof window !== 'undefined') {
  win = window as GlobalLike;
} else if (typeof global !== 'undefined') {
  win = global as unknown as GlobalLike;
} else if (typeof self !== 'undefined') {
  win = self as GlobalLike;
} else {
  win = {} as GlobalLike;
}

export default win;
