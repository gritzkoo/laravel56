<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exceptions\NegocioException;
use App\Traits\HelperTrait;

class BaseService
{
    use HelperTrait;
}