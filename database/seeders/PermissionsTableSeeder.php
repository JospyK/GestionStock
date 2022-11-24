<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'contact_create',
            ],
            [
                'id'    => 20,
                'title' => 'contact_edit',
            ],
            [
                'id'    => 21,
                'title' => 'contact_show',
            ],
            [
                'id'    => 22,
                'title' => 'contact_delete',
            ],
            [
                'id'    => 23,
                'title' => 'contact_access',
            ],
            [
                'id'    => 24,
                'title' => 'categorie_create',
            ],
            [
                'id'    => 25,
                'title' => 'categorie_edit',
            ],
            [
                'id'    => 26,
                'title' => 'categorie_show',
            ],
            [
                'id'    => 27,
                'title' => 'categorie_delete',
            ],
            [
                'id'    => 28,
                'title' => 'categorie_access',
            ],
            [
                'id'    => 29,
                'title' => 'gestion_des_article_access',
            ],
            [
                'id'    => 30,
                'title' => 'article_create',
            ],
            [
                'id'    => 31,
                'title' => 'article_edit',
            ],
            [
                'id'    => 32,
                'title' => 'article_show',
            ],
            [
                'id'    => 33,
                'title' => 'article_delete',
            ],
            [
                'id'    => 34,
                'title' => 'article_access',
            ],
            [
                'id'    => 35,
                'title' => 'num_serie_create',
            ],
            [
                'id'    => 36,
                'title' => 'num_serie_edit',
            ],
            [
                'id'    => 37,
                'title' => 'num_serie_show',
            ],
            [
                'id'    => 38,
                'title' => 'num_serie_delete',
            ],
            [
                'id'    => 39,
                'title' => 'num_serie_access',
            ],
            [
                'id'    => 40,
                'title' => 'facture_create',
            ],
            [
                'id'    => 41,
                'title' => 'facture_edit',
            ],
            [
                'id'    => 42,
                'title' => 'facture_show',
            ],
            [
                'id'    => 43,
                'title' => 'facture_delete',
            ],
            [
                'id'    => 44,
                'title' => 'facture_access',
            ],
            [
                'id'    => 45,
                'title' => 'facture_detail_create',
            ],
            [
                'id'    => 46,
                'title' => 'facture_detail_edit',
            ],
            [
                'id'    => 47,
                'title' => 'facture_detail_show',
            ],
            [
                'id'    => 48,
                'title' => 'facture_detail_delete',
            ],
            [
                'id'    => 49,
                'title' => 'facture_detail_access',
            ],
            [
                'id'    => 50,
                'title' => 'approvisionnement_create',
            ],
            [
                'id'    => 51,
                'title' => 'approvisionnement_edit',
            ],
            [
                'id'    => 52,
                'title' => 'approvisionnement_show',
            ],
            [
                'id'    => 53,
                'title' => 'approvisionnement_delete',
            ],
            [
                'id'    => 54,
                'title' => 'approvisionnement_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
