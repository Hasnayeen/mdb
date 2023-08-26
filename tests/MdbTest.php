<?php

use Hasnayeen\Mdb\Mdb;
use Hasnayeen\Mdb\Tests\TestComponent;
use Illuminate\Support\Facades\Blade;

it('will render markdown', function () {
    $content = '# Hello World';

    $expected = '<h1>Hello World</h1>
';

    $this->assertEquals($expected, (new Mdb())->render($content));
});

it('will render markdown with config', function () {
    $content = '# Hello World';

    $expected = '<h1>Hello World</h1>
';

    $this->assertEquals($expected, (new Mdb())->render($content, ['allow_unsafe_links' => false]));
});

it('will render markdown with blade component', function () {
    Blade::component('test-component', TestComponent::class);
    $content = '<x-test-component></x-test-component>';

    $expected = '<div class="test-component">Test Component</div>
';

    $this->assertEquals($expected, (new Mdb())->render($content));
});
