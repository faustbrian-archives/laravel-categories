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

namespace Konceiver\Categories\Tests\Unit\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Konceiver\Categories\Models\Category;
use Konceiver\Categories\Tests\TestCase;

/**
 * @covers \Konceiver\Categories\Models\Category
 */
class CategoryTest extends TestCase
{
    /** @test */
    public function morphs_to_a_notifiable(): void
    {
        $this->loadLaravelMigrations(['--database' => 'testbench']);
        $this->artisan('migrate', ['--database' => 'testbench'])->run();

        $class = Category::create(['name' => 'My Category']);

        $this->assertInstanceOf(MorphTo::class, $class->categories());
    }
}
