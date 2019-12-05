<?php

use Illuminate\Database\Seeder;

class OtdelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('otdels')->insert([
            [
                'otdelname'=>'Кадры',
                'otdelfullname'=>'Отдел кадров',
            ],
            [
                'otdelname'=>'Бухгалтерия',
                'otdelfullname'=>'Бухгалтерия',
            ],
            [
                 'otdelname'=>'ОПЭ и ОТиЗ',
                 'otdelfullname'=>'Отдел планово-экономический, ОТиЗ',
            ],
            [
                 'otdelname'=>'Эксплуатация',
                 'otdelfullname'=>'Отдел эксплуотации',
            ],
            [
                 'otdelname'=>'ПТО и МТО',
                 'otdelfullname'=>'Производственно технический отдел',
            ],
            [
                 'otdelname'=>'Управление',
                 'otdelfullname'=>'Управление',
            ],
        ]);
    }
}
