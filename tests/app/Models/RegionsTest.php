<?php

namespace App\Models;

use CodeIgniter\Test\CIUnitTestCase;

class TestRegions extends CIUnitTestCase {

    public function test_get_all_regions() {
        $model = new Region();
        $result = $model->getAllRegions();

        print_r($result);
    }
}