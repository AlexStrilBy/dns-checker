<?php

namespace Feature;

use Alexs\DNSChecker\DnsRecordsService;
use Alexs\DNSChecker\Resolver\DnsResolver;
use Alexs\DNSChecker\Resolver\IDnsResolver;
use Mockery;
use PHPUnit\Framework\TestCase;

class DNSCheckerTest extends TestCase
{
    private IDnsResolver $dnsResolver;

    private DnsRecordsService $dnsRecordsService;

    public function setUp(): void
    {
        $this->dnsResolver = new DnsResolver();
        $this->dnsRecordsService = new DnsRecordsService($this->dnsResolver);
    }

    public function testDnsRecordsService()
    {
        $records = $this->dnsRecordsService->getDnsRecords('google.com');

        $this->assertIsArray($records);
        $this->assertNotEmpty($records);

        foreach ($records as $record) {
            $this->assertArrayHasKey('type', $record);
            $this->assertArrayHasKey('name', $record);
            $this->assertArrayHasKey('ttl', $record);
            $this->assertArrayHasKey('data', $record);
        }
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
}