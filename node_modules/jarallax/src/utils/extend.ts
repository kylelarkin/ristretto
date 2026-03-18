/**
 * Extend like jQuery.extend
 *
 * @param {Object} out - output object.
 * @param {...any} args - additional objects to extend.
 *
 * @returns {Object}
 */
export default function extend<T extends Record<string, unknown>>(
  out: T,
  ...args: Array<Record<string, unknown> | null | undefined>
): T {
  const result = out || ({} as T);

  Object.keys(args).forEach((index) => {
    const source = args[Number(index)];

    if (!source) {
      return;
    }

    Object.keys(source).forEach((key) => {
      result[key as keyof T] = source[key] as T[keyof T];
    });
  });

  return result;
}
