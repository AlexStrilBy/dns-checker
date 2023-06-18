<?php

namespace Alexs\DNSChecker\Resolver;

interface IDnsResolver
{
    public function getRecord($domain, $type): false|array;

    public function getAllRecords($domain): false|array;
}