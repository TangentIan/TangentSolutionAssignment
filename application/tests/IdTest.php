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
        $response = $this->get('/api/id');

        $request = '/api/id/' . json_encode($response->toString());

        $this->get($request)
            ->seeJsonEquals([
                'valid' => true
            ]);
    }
}
