<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class HomeDataDefault extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('homedetail')->insert([
            	'name' => 'Trung tâm Gia sư sư phạm chất lượng cao số 1 Hà Nộ...',
            	'contentText' => 'gia sư, gia sư hà nội, trung tâm gia sư uy tín, gia sư chất lượng cao, gia sư giỏi, gia sư sư phạm, gia sư uy tín',
            	'keyword' => 'Trung tâm Gia sư giỏi, chất lượng cao, gia sư sư phạm, giàu kinh nghiệm, dạy tốt, hồ sơ rõ ràng, được đào tạo bài bản, tạo cảm hứng học tập cho học sinh.',
            	'phone' => '+840342682117',
            	'email' => 'minhmen99@gmail.com',
            	'address' => 'Văn phòng: Số 31, Ngách 48, Ngõ 1, Phạm Tuấn Tài, Cầu Giấy, Hà Nội',
            	'recommend' => 'TRUNG TÂM GIA SƯ ĐỨC MINH - CÔNG TY TNHH GIÁO DỤC VÀ ĐÀO TẠO ĐỨC MINH',
            	'description' => 'Trung tâm Gia sư giỏi, chất lượng cao, gia sư sư phạm, giàu kinh nghiệm, dạy tốt, hồ sơ rõ ràng, được đào tạo bài bản, tạo cảm hứng học tập cho học sinh',
            	'logoSite' => '5df14976c2b19_1576094070.png',
            	'mapIframe' => 'value null',
            	'linkFB' => 'https://www.facebook.com/bo.cuaban.7169',
            	'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    }
}
