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
                'otdelname'=>'share',
                'otdelfullname'=>'Общая группа',
            ],
            [
                'otdelname'=>'kadri',
                'otdelfullname'=>'Отдел кадров',
            ],
            [
                'otdelname'=>'buh',
                'otdelfullname'=>'Бухгалтерия',
            ],
            [
                 'otdelname'=>'otiz',
                 'otdelfullname'=>'Отдел планово-экономический, ОТиЗ',
            ],
            [
                 'otdelname'=>'expluot',
                 'otdelfullname'=>'Отдел эксплуотации',
            ],
            [
                 'otdelname'=>'pto',
                 'otdelfullname'=>'Производственно технический отдел',
            ],
            [
                 'otdelname'=>'ypravlenie',
                 'otdelfullname'=>'Управление',
            ],
        ]);
    }
}
