<?php declare(strict_types=1);

namespace Drupal\custom_movies\Normalizer;

use Drupal\serialization\Normalizer\ContentEntityNormalizer;

/**
 * Movie entity normalizer class.
 */
class MovieEntityNormalizer extends ContentEntityNormalizer {

  /**
   * The interface or class that this Normalizer supports.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = 'Drupal\custom_movies\Entity\Movie';

  /**
   * @param \Drupal\custom_movies\Entity\Movie $entity
   * @param string $format
   * @param array $context
   *
   * @return array|string|int|float|bool|\ArrayObject|NULL
   * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
   */
  public function normalize($entity, $format = NULL, array $context = []): array|string|int|float|bool|\ArrayObject|null {
    $data = [
      'id' => $entity->id(),
      'title' => $entity->label(),
      'release_date' => $entity->release_date->value,
    ];
    if (!empty($entity->genre->entity)) {
      $data['genre'] = $entity->genre->entity->label();
    }
    return $data;
  }

}
