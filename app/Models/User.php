<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Support\HtmlString;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function hasRole(string $role): bool
    {
        return strtolower($this->role ?? '') === strtolower($role);
    }

    public function sendPasswordResetNotification($token)
    {
        $url = url(route('password.reset', [
            'token' => $token,
            'email' => $this->getEmailForPasswordReset(),
        ]));

        $mailMessage = (new MailMessage)
            ->subject('Notifikasi Atur Ulang Kata Sandi')
            ->greeting('Halo,')
            ->line('Anda menerima email ini karena kami menerima permintaan untuk mengatur ulang kata sandi akun Anda.')
            ->action('Atur Ulang Kata Sandi', $url)
            ->line('Tautan ini akan kedaluwarsa dalam ' . config('auth.passwords.' . config('auth.defaults.passwords') . '.expire') . ' menit.')
            ->line(new HtmlString('<hr style="border: none; border-top: 1px solid #e5e7eb; margin: 20px 0;">'))
            ->line('Jika tombol di atas tidak berfungsi, Anda bisa salin dan tempel URL di bawah ini ke browser Anda:')
            ->line(new HtmlString('<a href="' . $url . '" style="color: #3490dc; text-decoration: underline; word-break: break-all;">' . $url . '</a>'))
            ->line('Jika Anda tidak merasa melakukan permintaan ini, abaikan saja email ini.')
            ->salutation(new HtmlString('Hormat kami,<br>Tim RSUD Balung'));

        $this->notify(new class($mailMessage) extends \Illuminate\Notifications\Notification {
            public $mailMessage;

            public function __construct($mailMessage)
            {
                $this->mailMessage = $mailMessage;
            }

            public function via($notifiable)
            {
                return ['mail'];
            }

            public function toMail($notifiable)
            {
                return $this->mailMessage;
            }
        });
    }
}
