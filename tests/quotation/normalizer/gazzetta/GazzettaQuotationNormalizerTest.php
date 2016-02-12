<?php

include __DIR__ . '/../../../../src/quotation/normalizer/gazzetta/GazzettaQuotationNormalizer.php';

class GazzettaQuotationNormalizerTest extends PHPUnit_Framework_TestCase {

  public function testGazzettaQuotationNormalizerConstruct() {
    $normalizer = new GazzettaQuotationsNormalizer();
  }
}
