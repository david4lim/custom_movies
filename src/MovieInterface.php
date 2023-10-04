<?php declare(strict_types=1);

namespace Drupal\custom_movies;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface defining a movie entity type.
 */
interface MovieInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

}
