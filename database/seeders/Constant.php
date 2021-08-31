<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use anlutro\LaravelSettings\Facade as Setting;

class Constant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dictionary for nations
        Setting()->set("nation1", 'Kinh');
        Setting()->set("nation2", 'Tày');
        Setting()->set("nation3", 'Thái');
        Setting()->set("nation4", 'Hoa');
        Setting()->set("nation5", 'Khơ-me');
        Setting()->set("nation6", 'Mường');
        Setting()->set("nation7", 'Mùng');
        Setting()->set("nation8", 'Hmông');
        Setting()->set("nation9", 'Dao');
        Setting()->set("nation10", 'Gia-rai');
        Setting()->set("nation11", 'Ngái');
        Setting()->set("nation12", 'Ê-đê');
        Setting()->set("nation13", 'Ba-na');
        Setting()->set("nation14", 'Xơ-đăng');
        Setting()->set("nation15", 'Sán Chay');
        Setting()->set("nation16", 'Cơ-ho');
        Setting()->set("nation17", 'Chăm');
        Setting()->set("nation18", 'Sán Dìu');
        Setting()->set("nation19", 'Hrê');
        Setting()->set("nation20", 'Mnông');
        Setting()->set("nation21", 'Ra-glai');
        Setting()->set("nation22", 'Xtiêng');
        Setting()->set("nation23", 'Bru-Vân Kiều');
        Setting()->set("nation24", 'Thổ');
        Setting()->set("nation25", 'Giáy');
        Setting()->set("nation26", 'Cơ-tu');
        Setting()->set("nation27", 'Gié-Triêng');
        Setting()->set("nation28", 'Mạ');
        Setting()->set("nation29", 'Khơ-mú');
        Setting()->set("nation30", 'Co');
        Setting()->set("nation31", 'Ta-ôi');
        Setting()->set("nation32", 'Chơ-ro');
        Setting()->set("nation33", 'Kháng');
        Setting()->set("nation34", 'Xinh-mun');
        Setting()->set("nation35", 'Hà Nhì');
        Setting()->set("nation36", 'Chu-ru');
        Setting()->set("nation37", 'Lào');
        Setting()->set("nation38", 'La Chi');
        Setting()->set("nation39", 'La Ha ');
        Setting()->set("nation40", 'Phù Lá');
        Setting()->set("nation41", 'La Hủ');
        Setting()->set("nation42", 'Lự');
        Setting()->set("nation43", 'Lô Lô');
        Setting()->set("nation44", 'Chứt');
        Setting()->set("nation45", 'Mảng');
        Setting()->set("nation46", 'Pà Thẻn');
        Setting()->set("nation47", 'Cơ Lao');
        Setting()->set("nation48", 'Cống');
        Setting()->set("nation49", 'Bố Y');
        Setting()->set("nation50", 'Si La');
        Setting()->set("nation51", 'Pu Péo');
        Setting()->set("nation52", 'Brâu');
        Setting()->set("nation53", 'Ơ Đu');
        Setting()->set("nation54", 'Rơ-măm');
        Setting()->set("nation55", 'Khác');
        // Dictionary for gender
        Setting()->set("gender0", 'Nam');
        Setting()->set("gender1", 'Nữ');

        Setting::save();
    }
}
