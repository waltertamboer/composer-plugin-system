# composer-plugin-system

A plugin system architecture based on Composer. This is a proof of concept to test
how installing plugins would work.

## Why install plugins via Composer?

Composer adds basic functionality that makes life easier:

* Versions constraints making installing and updating easy.
* PHP extensions are checked for existance.
* Possibility to add dependencies to other plugins (composer packages).
* Deployment architecture via custom repositories and Packagist.
