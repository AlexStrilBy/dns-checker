<?php

namespace Alexs\DNSChecker;

class DnsRecordsService
{
    protected DnsResolver $resolver;

    public function __construct($resolver)
    {
        $this->resolver = $resolver;
    }

    public function getDnsRecords(string $domain): array
    {
        $records = [];


        $results = $this->resolver->getAllRecords($domain);
        if ($results) {
            foreach ($results as $result) {
                $records[] = [
                    'type' => $result['type'],
                    'name' => $result['host'],
                    'ttl' => $result['ttl'],
                    'data' => $result['ip'] ?? ($result['target'] ?? ''),
                ];
            }
        }

        return $records;
    }
}