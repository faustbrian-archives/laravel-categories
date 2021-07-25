<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Categories.
 *
 * (c) Konceiver <info@konceiver.dev>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Konceiver\Categories\Tests\Unit;

use Illuminate\Foundation\Auth\User;
use Konceiver\Categories\Concerns\HasCategories;

class ClassThatHasCategories extends User
{
    use HasCategories;

    public $table = 'users';

    public $guarded = [];
}
