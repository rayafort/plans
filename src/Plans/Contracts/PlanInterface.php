<?php

namespace RayaFort\Plans\Contracts;

interface PlanInterface
{
    public function features();
    public function isFree();
    public function hasTrial();
}
