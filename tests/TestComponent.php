<?php

namespace Hasnayeen\Mdb\Tests;

use Illuminate\View\Component;

class TestComponent extends Component
{
    public function render()
    {
        return '<div class="test-component">Test Component</div>';
    }
}
