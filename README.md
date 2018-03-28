# experiment-composer-plugin-system

A plugin system architecture based on Composer. This is a proof of concept to test
how installing plugins would work.

## Why install plugins via Composer?

Composer adds basic functionality that makes life easier!

## Pros

* Versions constraints making installing and updating easy.
* PHP extensions are checked for existance.
* Possibility to add dependencies to other plugins (composer packages).
* Deployment architecture via custom repositories and Packagist.

## Cons

* Installing might take a while so the user must wait or installing would have to be done
  in a queued job (e.g. Beanstalkd).
* The HOME directory must be accessible else composer won't run.
* You would have to maintain a list of all plugins that are installed.
  You can't parse the composer.json to lookup which plugins are installed because it also
  contains dependencies for your application.
* It would be possible to update the application dependencies since there is no way of tracking
  which dependencies are plugins and which one are application dependencies.
