<?php

namespace Tests\Feature;

use App\Models\Vacancy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Tests\TestCase;

class VacancyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_may_add_vacancy()
    {
        $vacancy = Vacancy::factory()->make();

        $this->post('/vacancies/', $vacancy->toArray());

        $this->assertDatabaseHas('vacancies', ['title' => $vacancy->title]);
    }

    /** @test */
    public function a_user_may_edit_vacancy()
    {
        $title = 'Some New Title';
        $vacancy = Vacancy::factory()->create();
        $array = $vacancy->toArray();
        $array['title'] = $title;

        $this->patch('/vacancies/' . $vacancy->id, $array);

        $this->assertDatabaseHas('vacancies', ['title' => $title]);
    }

    /** @test */
    public function a_vacancy_must_have_a_title()
    {
        $this->withExceptionHandling();

        $vacancy = Vacancy::factory()->make(['title' => '']);

        $this->post('/vacancies/', $vacancy->toArray())
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_vacancy_must_have_a_description()
    {
        $this->withExceptionHandling();

        $vacancy = Vacancy::factory()->make(['description' => '']);

        $this->post('/vacancies/', $vacancy->toArray())
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function a_user_may_delete_vacancy()
    {
        $title = 'Some New Title';
        $vacancy = Vacancy::factory()->create(['title' => $title]);

        $this->delete('/vacancies/' . $vacancy->id);

        $this->assertDatabaseMissing('vacancies', ['title' => $title]);
    }
}
