<?php

namespace Alexs\DNSChecker\Facades;

use Illuminate\Support\Facades\Facade;

class DnsRecords extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'DnsRecords';
    }
}