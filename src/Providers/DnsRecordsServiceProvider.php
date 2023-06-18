<?php

namespace Alexs\DNSChecker\Providers;

use Alexs\DNSChecker\DnsRecordsService;
use Alexs\DNSChecker\Resolver\DnsResolver;
use Illuminate\Support\ServiceProvider;

class DnsRecordsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('DnsRecords', function($app) {
            return new DnsRecordsService(new DnsResolver());
        });
    }
}