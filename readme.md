### Ved Authorization Package

#### Install
1. Install fresh version of Laravel 5.2

2. Require package `composer require thienkimlove/vauth:dev-master`

3. Add below like to `config/app.php` :
```
Thienkimlove\Vauth\VauthServiceProvider::class,
```

4. Run `php artisan vendor:publish && php artisan migrate && php artisan make:auth`

5. Add in `routes.php`
```
Route::get('example', function () {
    return view('vauth::example');
});

//Route::resource('posts', 'PostsController');
Route::get('index_post', '\thienkimlove\vauth\PostsController@index');
```
6. Register one user.

7. Create permission and role and map to user.

```
php artisan tinker
Psy Shell v0.7.2 (PHP 5.6.11-1ubuntu3.1 — cli) by Justin Hileman
>>>$user = App\User::first();
>>> $permission = new Thienkimlove\Vauth\Models\Permission;
=> Thienkimlove\Vauth\Models\Permission {#652}
>>> $permission->name="index_post";
=> "index_post"
>>> $permission->label="view list post";
=> "view list post"
>>> $permission->save();
=> true
>>> $role = new Thienkimlove\Vauth\Models\Role;
=> Thienkimlove\Vauth\Models\Role {#653}
>>> $role->name="manager";
=> "manager"
>>> $role->label="Manager";
=> "Manager"
>>> $role->save();
=> true
>>> $role->addPermission($permission);
=> null
>>> $user->assignRole('manager');
=> [
     "attached" => [
       1,
     ],
     "detached" => [],
     "updated" => [],
   ]
>>> exit
```

8. Browser to /example