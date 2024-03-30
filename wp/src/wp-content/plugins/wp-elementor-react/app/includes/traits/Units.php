<?php

trait Units
{
  /**
   * Returns list of units
   *
   * @since 0.0.1
   */
  function get_units()
  {
    return ['rem', 'em', 'px', '%', 'vh', 'vw'];
  }

  /**
   * Returns list of range
   *
   * @since 0.0.1
   */
  function get_ranges()
  {
    return [
      'rem' => [
        'min' => 0,
        'max' => 100,
        'step' => 0.5,
      ],
      'em' => [
        'min' => 0,
        'max' => 100,
        'step' => 0.5,
      ],
      'px' => [
        'min' => 0,
        'max' => 500,
        'step' => 1,
      ],
      '%' => [
        'min' => 0,
        'max' => 100,
        'step' => 1,
      ],
      'vh' => [
        'min' => 0,
        'max' => 200,
        'step' => 1,
      ],
      'vw' => [
        'min' => 0,
        'max' => 200,
        'step' => 1,
      ],
    ];
  }
}
