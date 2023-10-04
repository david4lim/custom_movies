<?php

namespace Drupal\custom_movies\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Validation constraint for DateTime items to ensure the format is correct.
 *
 * @Constraint(
 *   id = "DateTimeNotInFuture",
 *   label = @Translation("Datetime validation for allowing only dates not in
 *   the furure.", context = "Validation"),
 * )
 */
class DateTimeNotInFutureConstraint extends Constraint {

  /**
   * Message for when the value is in the future.
   *
   * @var string
   */
  public $futureDate = "The datetime value '@value' is a future date";

  /**
   * Message for when the value did not parse properly.
   *
   * @var string
   */
  public $badValue = "The datetime value '@value' did not parse properly for the format '@format'";

}
