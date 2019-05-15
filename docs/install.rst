Installation
============

Composer
--------

.. code-block:: bash

    $ composer require rayafort/plans

Service Provider
----------------

Add ``RayaFort\Plans\PlansServiceProvider::class`` to your application service providers file: ``config/app.php``.

.. code-block:: php

    'providers' => [
        /**
         * Third Party Service Providers...
         */
        RayaFort\Plans\PlansServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="RayaFort\Plans\PlansServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate

Traits and Contracts
--------------------

Add ``RayaFort\Plans\Traits\PlanSubscriber`` trait and ``RayaFort\Plans\Contracts\PlanSubscriberInterface`` contract to your ``User`` model.

See the following example:

.. code-block:: php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use RayaFort\Plans\Contracts\PlanSubscriberInterface;
    use RayaFort\Plans\Traits\PlanSubscriber;

    class User extends Authenticatable implements PlanSubscriberInterface
    {
        use PlanSubscriber;
