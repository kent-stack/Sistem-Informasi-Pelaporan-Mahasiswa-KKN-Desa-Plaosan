<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. DATA ADMIN (Tetap menggunakan email untuk admin agar standar)
        User::updateOrCreate(
            ['email' => 'admin@kknplaosan.com'],
            [
                'name' => 'Administrator KKN',
                'nim' => 'ADMIN01',
                'password' => Hash::make('AdminPlaosan2026!'),
                'is_admin' => true,
            ]
        );

        // 2. DATA MAHASISWA (Tanpa Email)
        $students = [
            // --- MALAYSIA ---
    // POLITEKNIK TUANKU SYED SIRAJUDDIN (PTSS)
    [
        'name' => 'MUHAMMAD RAFIQ SYARAFUDDIN BIN ROSLI SUHAIMI',
        'nim' => '18DKM23F2004',
        'password' => 'Xy7!pQ#z9K',
    ], [
        'name' => 'NUR ATHIRAH BT MOHD NOR',
        'nim' => '18DUP24F1996',
        'password' => 'Bv2$mR*t5W',
    ], [
        'name' => 'MUHAMMAD AIMAN ZIKRI BIN ZAMRI',
        'nim' => '18DHF24F2020',
        'password' => 'Lp9&kN%j3Q',
    ], [
        'name' => 'MIOR DANIEL IDLAN BIN MIOR IDRES',
        'nim' => '18DHR23F2017',
        'password' => 'Rf4#sG!h8X',
    ], [
        'name' => 'ARUNAAVAATHI A/P CHANDRASEGARAN',
        'nim' => '18DEP24F1999',
        'password' => 'Tw5*pM@d2Y',
    ], [
        'name' => 'ADAM MIKAEL BIN ABD JALIL',
        'nim' => '18DKE25F1003',
        'password' => 'Nc8^kR!v4Z',
    ], [
        'name' => 'WAN AMIR ABDELAZIZ BIN ASSERI',
        'nim' => '18DKE25F1021',
        'password' => 'Hb3$qX*m7K',
    ], [
        'name' => 'MUHAMMAD IQBAL QAYYUM BIN MOHD KHUSHAIRI',
        'nim' => '18DCV23F2014',
        'password' => 'Gf7%sW#p1Q',
    ],

    // POLITEKNIK PREMIER SULTAN ABDUL HALIM MU'ADZAM SHAH (POLIMAS)
    [
        'name' => 'MUHAMMAD AZFAR AIMAN BIN REAZIZUL',
        'nim' => '03DIT24F1152',
        'password' => 'Zj4!nV&r6M',
    ], [
        'name' => 'NUR AIN BINTI MOHD FIRDAUS',
        'nim' => '03DIT24F1143',
        'password' => 'Pk2#mC@x9T',
    ], [
        'name' => 'MUHAMMAD ALIF LUQMAN BIN MAHADI',
        'nim' => '03DIT24F1153',
        'password' => 'Qw8*fG%z3S',
    ], [
        'name' => 'AMMAAR HAZIQ BIN ABDUL',
        'nim' => '03DIT24F1091',
        'password' => 'Xn5^kJ!p7B',
    ], [
        'name' => 'NU\'MAN A\'DZIMI BIN MOHD SYARIFF',
        'nim' => '03DIT24F1130',
        'password' => 'Yt9&sM#d4V',
    ], [
        'name' => 'MUHAMMAD REZZUAN BIN JOHARI',
        'nim' => '03DIT24F1170',
        'password' => 'Lc3$vR*h1X',
    ],

    // POLITEKNIK SANDAKAN SABAH (PSS)
    [
        'name' => 'ERIKHA ERLION',
        'nim' => '27DAG23F2057',
        'password' => 'Br6!xP@m5N',
    ], [
        'name' => 'ANDIKAH NURHAYAT BIN RAZANALI',
        'nim' => '27DAG23F2070',
        'password' => 'Kp8#vS%t2Y',
    ], [
        'name' => 'CHALWIN BIN SINOH',
        'nim' => '27DAG24F2037',
        'password' => 'Jw4&fT*n9X',
    ], [
        'name' => 'MOHAMAD TAUFIQ HIDAYAT BIN MOHD YUSOFF',
        'nim' => '27DTQ25F1013',
        'password' => 'Mg7^kD!r3Z',
    ], [
        'name' => 'NUR AISYAH BINTI SAIFUL BAHARI',
        'nim' => '27DTQ25F1005',
        'password' => 'Vq2$sW#h8K',
    ],

    // KOLEJ KOMUNITI ARAU (KKA)
    [
        'name' => 'CHANAWUT A/L CHATEI',
        'nim' => 'R01SPK25F005',
        'password' => 'Xl5%pC!v6B',
    ], [
        'name' => 'NAUFAL HARRAZ BIN AHMAD YUSRI',
        'nim' => 'R01SPK25F056',
        'password' => 'Zr9&mN*t1M',
    ],

    // --- INDONESIA ---
    // INSTITUT TEKNOLOGI DAN BISNIS ASIA MALANG
    [
        'name' => 'HAVIVA NADHIROTUL LUVITA',
        'nim' => '23101050',
        'password' => 'Kd4#xG@p7Q',
    ], [
        'name' => 'ANGGUN MARITA',
        'nim' => '241011034',
        'password' => 'Yw6!vS%n2B',
    ], [
        'name' => 'AFDHILLA ALEA SALFITRY',
        'nim' => '241011253',
        'password' => 'Pm8*fR&s3X',
    ], [
        'name' => 'VALENT HENA OCTA REVANDA',
        'nim' => '23101243',
        'password' => 'Hz3^kN!t9V',
    ], [
        'name' => 'MOH. FATHUR ROHMAN',
        'nim' => '23101187',
        'password' => 'Bc7$pM#r5W',
    ], [
        'name' => 'EUGENIA WANADRI KUSUMA PUTRI',
        'nim' => '241011083',
        'password' => 'Sf2%jK*x1Q',
    ], [
        'name' => 'ARLYA PUTRI AZZAHRA',
        'nim' => '241011200',
        'password' => 'Nv9&tW@p4Y',
    ], [
        'name' => 'MOH YAHYA HIDAYAT',
        'nim' => '241011180',
        'password' => 'Gx4#sR!m7B',
    ], [
        'name' => 'IRENE HASTIANTI ZEFANYA',
        'nim' => '23101121',
        'password' => 'Kp6*vD%t2Z',
    ], [
        'name' => 'SUKMA LINUWIH',
        'nim' => '241021181',
        'password' => 'Rh3^fC&j9M',
    ], [
        'name' => 'MUHAMMAD KHOSYI AMAL TEGUH IMAN FIRMANSYAH',
        'nim' => '241021248',
        'password' => 'Vb8!xN#t5X',
    ], [
        'name' => 'ANASTHASYA EL EMERSON KLAU',
        'nim' => '241021112',
        'password' => 'Mw2$pS*k1Q',
    ], [
        'name' => 'GRACEA RANIA RUNTUTHOMAS',
        'nim' => '242031058',
        'password' => 'Zj7%rT@n4V',
    ], [
        'name' => 'NADYA ENJELITA JACOB',
        'nim' => '23203087',
        'password' => 'Pl5#kD!r8B',
    ], [
        'name' => 'EMMANUEL KENT AMADEO',
        'nim' => '23201066',
        'password' => 'Yc9*fW%x2Z',
    ], [
        'name' => 'KAROLUS KEWANAN',
        'nim' => '23201079',
        'password' => 'Hb4&sP*m6T',
    ], [
        'name' => 'FARREL RASENDRIYA',
        'nim' => '23202126',
        'password' => 'Xv2^mN!k3Q',
    ], [
        'name' => 'CHOIRUL MUNIR',
        'nim' => '23202265',
        'password' => 'Sf8$pG#r7V',
    ], [
        'name' => 'ATHALLAH AKMAL RAFANSYAH',
        'nim' => '23202238',
        'password' => 'Nj4%wX*t1B',
    ], [
        'name' => 'M. RAVAEL AULIA HARIS',
        'nim' => '23202039',
        'password' => 'Kp7&vS@x5M',
    ], [
        'name' => 'MOCH NOVAL TAUFIK KURROHΜΑΝ',
        'nim' => '23202149',
        'password' => 'Rh2#fD!n9W',
    ], [
        'name' => 'MARTINA DHORO',
        'nim' => '23202056',
        'password' => 'Gv9*mT%k4Z',
    ], [
        'name' => 'MUHAMMAD AZIDEN HERLAMBANG',
        'nim' => '23202133',
        'password' => 'Xb3^pR&s6Q',
    ],
];

        foreach ($students as $student) {
            User::updateOrCreate(
                ['nim' => $student['nim']], // Kunci unik menggunakan NIM
                [
                    'name' => $student['name'],
                    'email' => null,           // Email tidak diperlukan
                    'password' => Hash::make($student['password']),
                    'is_admin' => false,
                ]
            );
        }
    }
}
