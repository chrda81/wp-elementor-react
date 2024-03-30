import commonjs from '@rollup/plugin-commonjs';
import resolve from '@rollup/plugin-node-resolve';
import replace from '@rollup/plugin-replace';
import peerDepsExternal from 'rollup-plugin-peer-deps-external';
import typescript from '@rollup/plugin-typescript';
import css from "rollup-plugin-import-css";
import image from '@rollup/plugin-image';
import json from '@rollup/plugin-json';
import terser from '@rollup/plugin-terser';

export default [
  {
    input: 'resources/ts/dummy/main.tsx',
    output: [
      {
        file: 'assets/dummy.js',
        name: 'app',
        sourcemap: 'inline',
        format: 'es',
        inlineDynamicImports: true
      },
    ],
    plugins: [
      peerDepsExternal(),
      resolve({
        browser: true,
        dedupe: ['react', 'react-dom'],
      }),
      replace({
        preventAssignment: true,
        'process.env.NODE_ENV': JSON.stringify('production'),
      }),
      commonjs(),
      typescript({
        tsconfig: 'tsconfig.json',
        sourceMap: true,
        inlineSources: true,
      }),
      image(),
      css({ output: 'dummy.css', minify: true }),
      json(),
      terser()
    ],
  },
  {
    input: 'resources/ts/anotherdummy/main.tsx',
    output: [
      {
        file: 'assets/anotherdummy.js',
        name: 'app',
        sourcemap: 'inline',
        format: 'es',
        inlineDynamicImports: true
      },
    ],
    plugins: [
      peerDepsExternal(),
      resolve({
        browser: true,
        dedupe: ['react', 'react-dom'],
      }),
      replace({
        preventAssignment: true,
        'process.env.NODE_ENV': JSON.stringify('production'),
      }),
      commonjs(),
      typescript({
        tsconfig: 'tsconfig.json',
        sourceMap: true,
        inlineSources: true,
      }),
      image(),
      css({ output: 'anotherdummy.css', minify: true }),
      json(),
      terser()
    ],
  }
];