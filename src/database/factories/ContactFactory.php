<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoryId = rand(1,5);

        $details = [
            1 => [
                '発送予定日を教えてください',
                '配送状況を確認したいです。',
                '配送先を変更したいです。',
            ],
            2 => [
                '返品は可能でしょうか？',
                '不良品だったため交換したいです。',
                '返金の手続きについて教えてください。',
            ],
            3 => [
                '使用中に不具合が発生したため、原因と対応方法を教えてください。',
                '届いた商品が注文内容と異なっていたため、正しい商品を再送してほしいです。',
                '届いた商品が注文内容と異なっていたため、正しい商品を再送してほしいです。',
            ],
            4 => [
                'エラーが表示されます。',
                'サイトの使い方が分かりません。',
                'ログインできないのですが。',
            ],
            5 => [
                'サイズや素材を確認したいです。',
                '仕様について詳しく知りたいです。',
                '商品の使い方について教えてください。',
            ],
        ];

        return [
            'category_id' => $categoryId,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'building' => $this->faker->optional()->secondaryAddress(),
            'detail' => $this->faker->randomElement($details[$categoryId]),
        ];
    }
}
