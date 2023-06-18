<?php

namespace Alexs\DNSChecker\Resolver;

class DnsResolver implements IDnsResolver
{
    public function getRecord($domain, $type): false|array
    {
        return dns_get_record($domain, $type);
    }

    public function getAllRecords($domain): false|array
    {
        return $this->getRecord($domain, DNS_ALL);
    }
}