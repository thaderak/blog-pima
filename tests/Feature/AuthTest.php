<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the login page can be rendered.
     */
    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Iniciar Sesión');
        $response->assertSee('Correo Electrónico');
        $response->assertSee('Contraseña');
    }

    /**
     * Test that the registration page can be rendered.
     */
    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/registro');

        $response->assertStatus(200);
        $response->assertSee('Crea tu Cuenta');
        $response->assertSee('Nombre Completo');
        $response->assertSee('Confirmar Contraseña');
    }

    /**
     * Test that a user can register with valid credentials.
     */
    public function test_new_users_can_register(): void
    {
        $response = $this->post('/registro', [
            'name' => 'Isabel Alarcón',
            'email' => 'isabel@example.com',
            'password' => 'secret1234',
            'password_confirmation' => 'secret1234',
            'terms' => 'on',
        ]);

        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'name' => 'Isabel Alarcón',
            'email' => 'isabel@example.com',
        ]);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');
    }

    /**
     * Test registration validation with duplicate email.
     */
    public function test_user_cannot_register_with_existing_email(): void
    {
        User::create([
            'name' => 'Usuario Existente',
            'email' => 'duplicado@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/registro', [
            'name' => 'Otro Usuario',
            'email' => 'duplicado@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => 'on',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * Test registration validation with mismatched password.
     */
    public function test_user_cannot_register_with_mismatched_password(): void
    {
        $response = $this->post('/registro', [
            'name' => 'Usuario Test',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'diferente456',
            'terms' => 'on',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }

    /**
     * Test that users can authenticate using the login screen.
     */
    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::create([
            'name' => 'Carlos Mendoza',
            'email' => 'carlos@example.com',
            'password' => Hash::make('secreto123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secreto123',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('success');
    }

    /**
     * Test that users cannot authenticate with invalid password.
     */
    public function test_users_cannot_authenticate_with_invalid_password(): void
    {
        $user = User::create([
            'name' => 'Carlos Mendoza',
            'email' => 'carlos@example.com',
            'password' => Hash::make('secreto123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password-incorrecta',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test that an authenticated user can logout.
     */
    public function test_users_can_logout(): void
    {
        $user = User::create([
            'name' => 'Mariana Silva',
            'email' => 'mariana@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('home'));
        $response->assertSessionHas('info');
    }

    /**
     * Test that guest sees Acceder in navbar and authenticated user sees their name.
     */
    public function test_navbar_displays_correct_auth_state(): void
    {
        $guestResponse = $this->get('/');
        $guestResponse->assertSee('Acceder');

        $user = User::create([
            'name' => 'Valeria Ruiz',
            'email' => 'valeria@example.com',
            'password' => Hash::make('password123'),
        ]);

        $authResponse = $this->actingAs($user)->get('/');
        $authResponse->assertSee('Valeria Ruiz');
        $authResponse->assertSee('Cerrar Sesión');
    }

    /**
     * Test authenticated users are redirected away from login and register.
     */
    public function test_authenticated_users_are_redirected_from_guest_pages(): void
    {
        $user = User::create([
            'name' => 'Diego Paz',
            'email' => 'diego@example.com',
            'password' => Hash::make('password123'),
        ]);

        $loginResponse = $this->actingAs($user)->get('/login');
        $loginResponse->assertRedirect(route('home'));

        $registerResponse = $this->actingAs($user)->get('/registro');
        $registerResponse->assertRedirect(route('home'));
    }
}
