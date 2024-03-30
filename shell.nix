# https://churchman.nl/2019/01/22/using-nix-to-create-python-virtual-environments/
with import <nixpkgs> {};
let
  nodejs = pkgs.nodejs_18;
  yarn = pkgs.yarn.override { inherit nodejs; };
in
  pkgs.mkShell {
    buildInputs = [
      nodejs
      yarn
      php
	    php82Packages.composer
      bashInteractive
    ];
    shellHook = ''
      yarn set version 4.0.2 --cwd "$(pwd)/wp/src/wp-content/plugins/wp-elementor-react/" --yarn-path "$(pwd)/wp/src/wp-content/plugins/wp-elementor-react/.yarn"
    '';
  }