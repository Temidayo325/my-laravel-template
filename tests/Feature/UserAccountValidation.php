<?php

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class, WithFaker::class);

it("should send code to mail", function(){});
it("should redirect to where verification would be entered", function(){});