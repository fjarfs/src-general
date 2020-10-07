# SRC General

<p align="center">
<a href="https://packagist.org/packages/fjarfs/src-general"><img src="https://img.shields.io/packagist/dt/fjarfs/src-general" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/fjarfs/src-general"><img src="https://img.shields.io/packagist/v/fjarfs/src-general" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/fjarfs/src-general"><img src="https://img.shields.io/packagist/l/fjarfs/src-general" alt="License"></a>
</p>

**SRC General** merupakan package yang digunakan oleh aplikasi SRC dan berisi tentang function-function yang bersifat general

### Cara Install

- `composer require fjarfs/src-general`

    ##### Laravel 

    - Otomatis terdaftar oleh `Laravel Package Discovery`

    ##### Lumen

    - Daftarkan service provider di `bootstrap/app.php`
    	```php
    	$app->register(Fjarfs\SrcGeneral\SrcGeneralProvider::class);
    	```

### Function yang tersedia

- **Helper**
	- [Access](#dqbAccess)

### Cara Penggunaan

- <a name="#dqbAccess"></a> **Access**

    Access Module

	```php
	 use Fjarfs\SrcGeneral\Helpers\Access as AccessModule;
	
	AccessModule::module('http://localhost/api/v1/user/principal/user', $auth);
	```

	contoh:
	
    ```php
	<?php
    
    namespace App\Http\Middleware;
    
    use Closure;
    use App\Libraries\Services\Core\Auth;
    use Fjarfs\SrcGeneral\Helpers\Access as AccessModule;
    
    class Access
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            $auth = Auth::info();
            if ($auth) {
                if (AccessModule::module($request->path(), $auth) == false) {
                    return response()->json(['message' => 'Tidak ada otorisasi'], 401);
                }
            }
            
            return $next($request);
        }
    }
	```
