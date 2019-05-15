Usage
=====

Create a Plan
-------------

.. code-block:: php

    use RayaFort\Plans\Models\Plan;
    use RayaFort\Plans\Models\PlanFeature;

    $plan = Plan::create([
        'name' => 'Pro',
        'description' => 'Pro plan',
        'price' => 9.99,
        'interval' => 'month',
        'interval_count' => 1,
        'trial_period_days' => 15,
        'sort_order' => 1,
    ]);

    $plan->features()->saveMany([
        new PlanFeature(['code' => 'listings', 'value' => 50, 'sort_order' => 1]),
        new PlanFeature(['code' => 'pictures_per_listing', 'value' => 10, 'sort_order' => 5]),
        new PlanFeature(['code' => 'listing_duration_days', 'value' => 30, 'sort_order' => 10]),
        new PlanFeature(['code' => 'listing_title_bold', 'value' => 'Y', 'sort_order' => 15])
    ]);

Accessing Plan Features
-----------------------

In some cases you need to access a particular feature in a particular plan, you can accomplish this by using the ``getFeatureByCode`` method available in the ``Plan`` model.

Example:

.. code-block:: php

    $feature = $plan->getFeatureByCode('pictures_per_listing');
    $feature->value // Get the feature's value


