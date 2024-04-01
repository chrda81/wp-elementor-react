import React from 'react';
import { createRoot } from 'react-dom/client';
import {
  Link as RouterLink,
  LinkProps as RouterLinkProps,
  BrowserRouter
}
  from 'react-router-dom';
import { StaticRouter } from 'react-router-dom/server';
import CssBaseline from '@mui/material/CssBaseline';
import { ThemeProvider, createTheme } from '@mui/material/styles';
import { LinkProps } from '@mui/material/Link';
import * as Colors from '../modules/Colors';
import App from './App';

const LinkBehavior = React.forwardRef<
  HTMLAnchorElement,
  Omit<RouterLinkProps, 'to'> & { href: RouterLinkProps['to'] }
>((props, ref) => {
  const { href, ...other } = props;
  // Map href (MUI) -> to (react-router)
  return <RouterLink data-testid="custom-link" ref={ref} to={href} {...other} />;
});

function Router(props: { basename: string, children?: React.ReactNode }) {
  const { basename, children } = props;
  if (typeof window === 'undefined') {
    return <StaticRouter location={`/${basename}`}>{children}</StaticRouter>;
  }

  return <BrowserRouter basename={`/${basename}`}>{children}</BrowserRouter>;
}

window.addEventListener('load', () => {
  const idStartsWith = 'wpelementorreact-dummy';
  const targets = document.querySelectorAll(`div[id^=${idStartsWith}]`);

  if (targets.length === 0) {
    throw new Error('Cannot find any element starting with #wpelementorreact-dummy');
  }

  targets.forEach(target => {
    // if target has no child nodes or node is a text node
    if (!target.hasChildNodes() || target?.firstChild?.nodeType === Node.TEXT_NODE) {
      //console.log(`Injecting React component in target ${target.id}`);

      const settings = JSON.parse(target.getAttribute('data-default-settings') || '{}');
      const root = createRoot(target);

      const theme = settings?.theme || 'light';
      const switchTheme = createTheme({
        palette: {
          mode: theme,
          ...(theme === 'light' ? Colors.lightPalette : Colors.darkPalette),
        },
        components: {
          MuiTypography: {
            defaultProps: {
              color: 'inherit',
            },
          },
          MuiLink: {
            defaultProps: {
              component: LinkBehavior,
            } as LinkProps,
          },
          MuiButtonBase: {
            defaultProps: {
              LinkComponent: LinkBehavior,
            },
          },
        },
      });

      root.render(
        <React.StrictMode>
          <ThemeProvider theme={switchTheme}>
            <Router basename={settings?.slug}>
              <CssBaseline />
              <App settings={settings} />
            </Router>
          </ThemeProvider>
        </React.StrictMode>
      );
    }
  });
});