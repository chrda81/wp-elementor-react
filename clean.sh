#!/bin/bash
rm -rf db/
rm -rf $(find wp/src/* -maxdepth 1 -name "*" ! -name "plugins" ! -name "wp-content")
rm -rf $(find wp/src/wp-content/* -maxdepth 1 -name "*" ! -name "plugins" ! -name "wp-elementor-react")
#rm -rf wp/src/wp-content/plugins/wp-elementor-react/node_modules
#rm -rf wp/src/wp-content/plugins/wp-elementor-react/vendor