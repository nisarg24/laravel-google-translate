<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TranslatorTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function translate()
    {
        $translatorData = [
            'text' => 'I want to fly.',
            'toLang' => 'fr'
        ];

        $this->json('POST', 'translate', $translatorData)
            ->assertStatus(200)
            ->assertJsonStructure([
                'success',
                'error',
                'translation'
            ]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function validateTranslate()
    {
        $translatorData = [
            'text' => '',
            'toLang' => 'fr'
        ];

        $this->json('POST', 'translate', $translatorData)
            ->assertStatus(422)
            ->assertJson([
                'message' => "The text field is required.",
                'errors' => [
                    'text' => ['The text field is required.']
                ] 
            ]);
    }
}
