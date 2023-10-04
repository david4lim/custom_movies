<?php

namespace Drupal\custom_movies\Plugin\Validation\Constraint;

use Drupal\Component\Datetime\DateTimePlus;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItem;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Constraint validator for DateTime items to ensure the date is correct.
 */
class DateTimeNotInFutureConstraintValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($value, Constraint $constraint) {
    /** @var \Drupal\datetime\Plugin\Field\FieldType\DateTimeItem $value */
    if (isset($value) && is_string($value->value)) {
      $datetime_type = $value->getFieldDefinition()
        ->getSetting('datetime_type');
      $format = $datetime_type === DateTimeItem::DATETIME_TYPE_DATE ? DateTimeItemInterface::DATE_STORAGE_FORMAT : DateTimeItemInterface::DATETIME_STORAGE_FORMAT;

      try {
        $date = DateTimePlus::createFromFormat($format, $value->value, new \DateTimeZone(DateTimeItemInterface::STORAGE_TIMEZONE));
        if (!$date) {
          return;
        }
        $diff = $date->diff(new DateTimePlus());
        if ($diff->invert) {
          $this->context->addViolation($constraint->futureDate, [
            '@value' => $value->value,
          ]);
        }
      }
      catch (\Exception $e) {
        $this->context->addViolation($constraint->badValue, [
          '@value' => $value->value,
          '@format' => $format,
        ]);
        return;
      }
    }
  }

}
