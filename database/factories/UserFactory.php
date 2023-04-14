<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        $gender = Arr::random(['male', 'female']);
        return [
            'level' => 'customer',
            'name' => $this->getFirstName($gender).' '.$this->getRandomLastName(),
            'email' => fake()->unique()->safeEmail(),
            'mobile' => Arr::random([$this->getUniqePhoneNumber(), null]),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }


    public function superAdmin()
    {
        return $this->state(function (array $attributes) {
            return [
                'level'         => 'admin',
                'name'          => 'محمد کثیری',
                'mobile'        => '09109529484',
                'email'         => 'mohammad.kasirey@gmail.com',
                'password'      => Hash::make(11111111),
                'email_verified_at' => now(),
            ];
        });
    }
    public function customer()
    {
        return $this->state(function (array $attributes) {
            return [
                'level' => 'customer',
            ];
        });
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    private function getFirstName(string $gender = 'male'): string
    {
        return $gender == 'male'
            ? $this->getRandomMaleFirstName()
            : $this->getRandomFemaleFirstName();
    }

    /**
     * * @param null
     * @return string Male First Name
     */
    private function getRandomMaleFirstName(): string
    {
        $maleNames = ['رضا', 'سجاد', 'شایان', 'دانیال', 'افشین', 'فربد', 'مصطفی', 'مهرداد', 'حامد', 'سپهر', 'محمد', 'علی', 'محمد رضا', 'حسین', 'فرید', 'امیر', 'علیرضا'];
        return Arr::random($maleNames);
    }

    /**
     * * @param null
     * @return string Female First Name
     */
    private function getRandomFemaleFirstName(): string
    {
        $femaleNames = ['یاسمین', 'مینا', 'درسا', 'فاطمه', 'مهدیه', 'الهه', 'سارا', 'نگار', 'نگین', 'راحله', 'سمانه', 'شیما', 'مهسا', 'هدیه', 'هلما', 'حمیرا'];
        return Arr::random($femaleNames);
    }

    /**
     * @param null
     * @return string LastName
     */
    private function getRandomLastName(): string
    {
        $lastNames = ['رضاپور', 'ابراهیمی', 'مرادی', 'میبدی', 'طاهری', 'موسوی', 'پناهی', 'آذری', 'قاضیان', 'شمسی', 'فلاح', 'محمدی', 'ترکاشوند', 'فتحیان', 'تبریزی', 'خراسانی', 'گودرزی', 'شریفی', 'شهبازی', 'حاتمی', 'نعمتی', 'کاظم زاده', 'علیپور', 'رضایی', 'کریمی', 'رحمانی', 'تاجیک', 'حیدری', 'خسروی', 'جهانی'];
        return Arr::random($lastNames);
    }

    /**
     * @return string
     */
    private function getUniqePhoneNumber(): string
    {
        $phone = generatePhone();
        $is_unique = User::query()->where('mobile', '=', $phone)->exists();
        return $is_unique == false
            ? $phone
            : $this->getUniqePhoneNumber();
    }

}
