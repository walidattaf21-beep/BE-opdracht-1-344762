<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'rol', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Controleert of de gebruiker een van de opgegeven rollen heeft.
     */
    public function heeftRol(string ...$rollen): bool
    {
        return in_array($this->rol, $rollen, true);
    }

    /**
     * Mag deze gebruiker het magazijn van Jamin bekijken?
     */
    public function magMagazijnZien(): bool
    {
        return $this->heeftRol('admin', 'magazijnmedewerker');
    }
}
