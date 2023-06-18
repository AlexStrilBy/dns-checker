# DNS Checker
## Package usage
- Use `DnsRecords` facade to check DNS records `DnsRecords::getDnsRecords('google.com')`
- Or you can make a new instance of `DnsRecords` class and use `getDnsRecords` 
method `$dnsRecords = new DnsRecords(new \Alexs\DNSChecker\Resolver\DnsResolver()); $dnsRecords->getDnsRecords('google.com')`
- Also, you can provide your custom resolver which implements `\Alexs\DNSChecker\Resolver\IDnsResolver` interface
- Service will return an array of dns records 
`[{"type":"A","name":"google.com","ttl":0,"data":"216.58.209.14"},{"type":"NS","name":"google.com","ttl":0,"data":"ns1.google.com"},{"type":"NS","name":"google.com","ttl":0,"data":"ns4.google.com"},...]`

## Package requirements
- php 8.1 or higher

## Package installation
- Install package with composer: `composer require alexs/dns-checker`
- Use Laravel package autoload or Add `Alexs\DnsChecker\DnsCheckerServiceProvider::class` to `providers` array in `config/app.php`


## Running tests
- Run `composer install` to install all dependencies
- Run `composer test` to run tests