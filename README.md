# Custom Module for managing movies

## What does this module do

1. Creates a custom content entity name Movie with the fields **title** and **release date**
2. Create a taxonomy vocabulary named **Genre** with the following terms: Comedy, Drama, and Action.
3. Add a **genre** field to the movie entity that is a reference to the Genre vocabulary.
4. Add validation to the movie entity’s add and edit forms so that the **release_date** field is required and that it cannot be in the future.
5. Expose a REST export for all the Movie entities.

## Usage

### Installation

#### Manually
Download and install as any other drupal module.

#### Composer
1. Add `david4lim/custom_movies` to your `composer.json` repositories:
```json
    "repositories": [
        {
            "type": "composer",
            "url": "https://packages.drupal.org/8"
        },
        {
            "type": "package",
            "package": {
                "name": "david4lim/custom_movies",
                "version": "dev-master",
                "type":"drupal-custom-module",
                "source": {
                    "url": "https://github.com/david4lim/custom_movies",
                    "type": "git",
                    "reference": "master"
                }
            }
        }
    ]
```
2. Add the composer package:
```shell
composer require david4lim/custom_movies:dev-master
```
3. Install the module using `drush`:
```shell
drush en custom_movies
```

### Managing movies
All the CRUD action can be found in `/admin/content/movie`.

### Accessing movies REST export
The movies export is accessible from the path `/movies?_format=json`, only `json` format is enabled, so it can also be accessed using only`/movies` and `json` format will be used.

## Notes
1. The movie entity was generated using the drush command `drush gen entity:content`.
2. The release date validation was done by creating a new field constraint plugin, and adding it to the `release_date` field definition.
3. All javascript alterations were done in the library `custom_movies/movies.admin_form`.
