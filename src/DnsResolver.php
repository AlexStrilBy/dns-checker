<?php

namespace Alexs\DNSChecker;

class DnsResolver
{
    private function getRecord($domain, $type): false|array
    {
        return dns_get_record($domain, $type);
    }

    public function getAllRecords($domain): false|array
    {
        return $this->getRecord($domain, DNS_ALL);
    }
}