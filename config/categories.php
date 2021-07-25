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

use Konceiver\Categories\Models\Category;

return [

    'models' => [

        'category' => Category::class,

    ],

    'tables' => [

        'categories' => 'categories',

        'model_has_categories' => 'model_has_categories',

    ],

];
