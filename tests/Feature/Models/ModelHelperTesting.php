<?php

namespace Tests\Feature\Models;

use App\Models\ActiveCode;
use App\Models\PasswordReset;

trait ModelHelperTesting
{

    public function testInsertToDataBase()
    {
        $model = $this->model();
        $table = $model->getTable();

        $insert = $model::factory()->create()->toArray();

        $this->assertDataBaseHas($table, $insert);
    }

}



?>