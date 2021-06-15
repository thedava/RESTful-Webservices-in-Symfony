<?php

declare(strict_types=1);

namespace App\Tests\Controller\Attendee;

use App\Tests\ApiTestCase;

class ReadControllerTest extends ApiTestCase
{
    public function test_it_should_requested_attendees(): void
    {
        $this->loadFixtures([
            __DIR__ . '/fixtures/read_attendee.yaml',
        ]);

        $this->browser->request('GET', '/attendees/00000000-0000-0000-0000-000000000000');

        static::assertResponseIsSuccessful();

        $this->assertMatchesJsonSnapshot($this->browser->getResponse()->getContent());
    }
}
