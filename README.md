# pmforms

Form API library for PocketMine-MP and Axolotl-PM plugins. This repository is a fork of [dktapps-pm-pl/pmforms](https://github.com/dktapps-pm-pl/pmforms), tracking its latest upstream code and retaining the original `dktapps\pmforms` namespace.

## Compatibility

- PHP 8.1 or newer
- PocketMine-MP API 5.x
- Axolotl-PM 5.49.1 for development analysis and DevTools integration

## Include in a plugin

With Poggit, add the virion to `.poggit.yml`:

```yaml
projects:
  YourPlugin:
    libs:
      - src: NhanAZ-Libraries/pmforms/pmforms
        version: ^2.3.0
```

See the upstream [demo plugin](https://github.com/dktapps-pm-pl/pmforms-demo) for form usage.

## Develop with DevTools

The root `virion.yml` lets Axolotl-PM [DevTools](https://github.com/NhanAZ/DevTools) load this checkout as a shared development virion. Put the repository at `virions/pmforms/`, then declare it in the consuming plugin's `devtools.yml`:

```yaml
virions:
  - name: pmforms
    version: ^2.3.0
```

DevTools uses the shared source during development and shades the library into a standalone plugin PHAR when building. The production plugin does not need DevTools installed. The [DevToolsConsumer example](examples/DevToolsConsumer/) is built and analyzed in CI.

## Development checks

```sh
composer install
composer validate --strict
composer analyse
```

PHPStan runs at `max` against Axolotl-PM 5.49.1.
