<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Companies\Models\Company;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use LaravelLiberu\Users\Models\User;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use Datatable, DestroyForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'administration.companies';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Company::factory()->test()->make();
    }

    /** @test */
    public function can_view_create_form()
    {
        $this->get(route($this->permissionGroup.'.create', false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function can_store_company()
    {
        $response = $this->post(
            route('administration.companies.store', [], false),
            $this->testModel->toArray()
        );

        $company = Company::whereName($this->testModel->name)
            ->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'administration.companies.edit',
                'param' => ['company' => $company->id],
            ]);
    }

    /** @test */
    public function can_update_company()
    {
        $this->testModel->save();
        $this->testModel->name = 'updated';

        $this->patch(
            route('administration.companies.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals(
            $this->testModel->name,
            $this->testModel->fresh()->name
        );
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('administration.companies.options', [
            'query' => $this->testModel->name,
            'limit' => 10,
        ], false))->assertStatus(200)
            ->assertJsonFragment(['name' => $this->testModel->name]);
    }
}
