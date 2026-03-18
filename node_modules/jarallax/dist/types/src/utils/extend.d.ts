/**
 * Extend like jQuery.extend
 *
 * @param {Object} out - output object.
 * @param {...any} args - additional objects to extend.
 *
 * @returns {Object}
 */
export default function extend<T extends Record<string, unknown>>(out: T, ...args: Array<Record<string, unknown> | null | undefined>): T;
//# sourceMappingURL=extend.d.ts.map