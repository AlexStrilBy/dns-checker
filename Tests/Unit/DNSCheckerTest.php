<?php

namespace Unit;

use Alexs\DNSChecker\DnsRecordsService;
use Alexs\DNSChecker\DnsResolver;
use Mockery;
use PHPUnit\Framework\TestCase;

class DNSCheckerTest extends TestCase
{
    /**
     * @var DnsResolver|\Mockery\MockInterface
     */
    private $dnsResolverMock;

    private DnsRecordsService $dnsRecordsService;

    public function setUp(): void
    {
        $this->dnsResolverMock = Mockery::mock(DnsResolver::class);
        $this->dnsRecordsService = new DnsRecordsService($this->dnsResolverMock);
    }

    public function testDnsRecordsService()
    {
        $dnsTypes = ['A', 'MX', 'NS', 'SOA', 'PTR', 'CNAME', 'AAAA', 'A6', 'SRV', 'NAPTR', 'TXT', 'HINFO'];
        $returnData = [];

        foreach ($dnsTypes as $dnsType) {
            $returnData[] = [
                'type' => $dnsType,
                'name' => 'google.com',
                'ttl' => 3600,
                'data' => '8.8.8.8',
            ];
        }

        $this->dnsResolverMock->shouldReceive('getAllRecords')
            ->andReturn($returnData);

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