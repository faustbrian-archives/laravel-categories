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

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateCategoriesTables extends Migration
{
    public function up()
    {
        Schema::create(Config::get('categories.tables.categories'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('type')->default('default');
            NestedSet::columns($table);
            $table->timestamps();
        });

        Schema::create(Config::get('categories.tables.model_has_categories'), function (Blueprint $table) {
            $table->integer('category_id');
            $table->morphs('model');
        });
    }

    public function down()
    {
        Schema::dropIfExists(Config::get('categories.tables.model_has_categories'));
        Schema::dropIfExists(Config::get('categories.tables.categories'));
    }
}
