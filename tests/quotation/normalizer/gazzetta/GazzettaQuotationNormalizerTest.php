<?php

class GazzettaQuotationNormalizerTest extends PHPUnit_Framework_TestCase {

  public function goodQuotationsToNormalizeProvider() {
    return array(
        array(
          array(
            'code' => 101,
            'goals' => 3
          ),
          array(
            'code' => 101,
            'goals' => 3
          )
        ),
    );
  }

  public function goodQuotationsToDenormalizeProvider() {
    return array(
      array(
        array(
          'code' => 101,
          'goals' => 3
        ),
        array(
          'code' => 101,
          'goals' => 3
        )
      ),
    );
  }

  /**
   * @dataProvider goodQuotationsToNormalizeProvider
   * @param Array $quotation
   * @param Array $result
   */
  public function testGazzettaQuotationNormalizerConstruct($quotation, $result) {
    $normalizer = new GazzettaQuotationsNormalizer();
    $this->assertEquals($result, $normalizer->normalize($quotation));
  }

  /**
   * @dataProvider goodQuotationsToDenormalizeProvider
   * @param Array $config
   * @param Array $result
   */
  public function testGazzettaQuotationDenormalizerConstruct($quotation, $result) {
    $normalizer = new GazzettaQuotationsNormalizer();
    $this->assertEquals($result, $normalizer->denormalize($quotation));
  }
}
