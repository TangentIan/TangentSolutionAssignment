<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IdTest extends TestCase
{
    /**
     * Test a valid South African ID Number against GET /api/id/{id}
     */
    public function test_valid_id()
    {
        $this->get('/api/id/9210015016088')
            ->seeJsonEquals([
                'valid' => true
            ]);
    }

    /**
     * Test a South African ID Number with an invalid length.
     */
    public function test_invalid_length_id()
    {
        $this->get('/api/id/9210060')
            ->seeJsonEquals([
                'error' => 'The given South African ID Number is invalid.'
            ]);
    }

    /**
     * Test a South African ID Number with invalid characters
     */
    public function test_invalid_characters_id()
    {
        $this->get('/api/id/asfdah')
            ->seeJsonEquals([
                'error' => 'The given South African ID Number is invalid.'
            ]);
    }

    /**
     * Test a invalid South African ID Number against GET /api/id/{id}
     */
    public function test_invalid_id()
    {
        $this->get('/api/id/9210015016085')
            ->seeJsonEquals([
                'valid' => false
            ]);
    }
    /**
     * Test a generated South African ID Number against GET /api/id/{id}
     * Generated from GET /api/id
     */

    public function test_generated_id()
    {
        $response = $this->call('GET','/api/id');

        $request = '/api/id/' . json_decode($response->getContent())->id;

        $this->get($request)
            ->seeJsonEquals([
                'valid' => true
            ]);
    }
}
