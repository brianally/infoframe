## Synopsis

Code review mini-app.

## Description

Upon migration a default User is created. Once logged in, more Users can be created, viewed, updated, or deleted. All Users can log in and have full access to other functionality.

Upon migration, the database is seeded with 10 Surgeons. A User may create, view, update or delete a Surgeon.

A User may also create, view, update, or delete Patients. Each Patient may be assiged to a single Surgeon.

Surgeons that have been assigned at least one Patient cannot be deleted.

Listings of Users, Surgeons, and Patients are paginated.


## Installation

The app was created using Laravel Homestead. If running within a Homestead vm, only the migrations should be required.

```shell
php artisan migrate --seed
```

## License

MIT
