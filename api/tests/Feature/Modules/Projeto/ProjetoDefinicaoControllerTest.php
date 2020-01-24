<?php

namespace Tests\Feature\Modules\Projeto;

use App\Modules\Projeto\Http\Controllers\ProjetoDefinicaoController;
use Tests\TestCase;

class ProjetoDefinicaoControllerTest extends TestCase
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application
     */
    private $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = app(ProjetoDefinicaoController::class);
    }

    public function test__construct()
    {
        $this->assertInstanceOf(ProjetoDefinicaoController::class, $this->controller);
    }

    public function testShow()
    {

    }

    public function testUpdate()
    {

    }

    public function testStore()
    {

    }
}
