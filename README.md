# Simple ESNtest for future Web Developers or for playing a bit

The purpose of this repository is to test the skills of our future
developers or our current ITcom members and see how they solve some
basic html and php task, how they manage to face the code by reading
the provided documentation and existing functions and evaluate their
coding skills and use of coding standards (we follow Drupal standards).

But anyone can clone this repo and start it, there is no limitation.

## System requirements

This test is configured for the following requirements:

- Webserver: Apache 2.4.7 or higher / Nginx 1.9.x or higher
- PHP: 8.5
- Composer: 2.11.2 or higher

As we primarely recommend DDEV for development, all the system requirements are
covered if you use it, as the needed configuration is already defined.

### Development environment
In order to have a working dev environment compatible with the test, the fastest
and recommended option is to install [DDEV](https://github.com/ddev/ddev),
(compatible with Windows, Linux and MacOS).
In the DDEV website is well documented how to install DDEV for each OS; please
follow the documentation you will find there based on your
You can use other setups (eg: traditional LAMP or Lando), but we recommend DDEV.

After DDEV is installed, you can run `ddev start` for loading the containers.

### DDEV and composer
DDEV provides a built-in command to simplify the use of PHP’s dependency
manager: Composer, without requiring it to be installed on the host machine.
Generally, executing any Composer command through DDEV is as simple as
prepending `ddev` to the command, such as `ddev composer install`.
If you have any question, you can read more about in in the [DDEV documentation page](https://ddev.readthedocs.io/en/stable/users/usage/developer-tools/#ddev-and-composer).

**Please read the additional instructions of DDEV related to Firefox
or certificates, if you experience any issue with the browser.**

## Launching the test
Did you started the container?
Did you run composer to install the dependencies?
Did you open the url in the browser?

If all answers are yes, the test should be accesible to you.

## Feedback
Do you have any feedback? *You can suggest it by opening an issue*

## Support and contributions
Did you enjoy the test? Do you want to support our organisation?
Feel free to [donate](https://donorbox.org/erasmus-student-network)

Are you a student? You are welcome to join [ESN](https://esn.org)

## Do you want to use it?
Please leave the credits in the footer of the test.
One mail or message is also more than welcome to see this code is useful for
other people :)
