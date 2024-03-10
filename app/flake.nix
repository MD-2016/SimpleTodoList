
{
  inputs = {
    nixpkgs.url = "github:NixOS/nixpkgs/nixos-unstable";
    systems.url = "github:nix-systems/default";
    devenv.url = "github:cachix/devenv";
  };

  outputs =
    {
      self,
      nixpkgs,
      devenv,
      systems,
      ...
    }@inputs:
    let
      forEachSystem = nixpkgs.lib.genAttrs (import systems);
    in
    {
      packages = forEachSystem (
        system: { devenv-up = self.devShells.${system}.default.config.procfileScript; }
      );

      devShells = forEachSystem (
        system:
        let
          pkgs = nixpkgs.legacyPackages.${system};
        in
        {
          default = devenv.lib.mkShell {
            inherit inputs pkgs;
            modules = [
              (
                { pkgs, config, ... }:
                {
                  # https://devenv.sh/reference/options/
                  dotenv.disableHint = true;

                  languages.php = {
                    enable = true;
                    fpm.pools.web = {
                      settings = {
                        "clear_env" = "no";
                        "pm" = "dynamic";
                        "pm.max_children" = 10;
                        "pm.start_servers" = 2;
                        "pm.min_spare_servers" = 1;
                        "pm.max_spare_servers" = 10;
                      };
                    };
                  };

                  services.caddy = {
                    enable = true;
                    virtualHosts.":8000" = {
                      extraConfig = ''
                        root * .
                        php_fastcgi unix/${config.languages.php.fpm.pools.web.socket}
                        file_server
                      '';
                    };
                  };
                }
              )
            ];
          };
        }
      );
    };
}