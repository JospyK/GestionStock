<?php

return [
    'userManagement' => [
        'title'          => 'Gestion des utilisateurs',
        'title_singular' => 'Gestion des utilisateurs',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Titre',
            'title_helper'      => ' ',
            'created_at'        => 'Créé le',
            'created_at_helper' => ' ',
            'updated_at'        => 'Mis à jour le',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Supprimé le',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Rôles',
        'title_singular' => 'Rôle',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Nom',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Créé le',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Mis à jour le',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Supprimé le',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Nom',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Créé le',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Mis à jour le',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Supprimé le',
            'deleted_at_helper'        => ' ',
            'banned_until'             => 'Banned Until',
            'banned_until_helper'      => ' ',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Créé le',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Mis à jour le',
            'updated_at_helper'   => ' ',
        ],
    ],
    'contact' => [
        'title'          => 'Contacts',
        'title_singular' => 'Contact',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'reference'             => 'Réference',
            'reference_helper'      => ' ',
            'telephone_1'           => 'Telephone 1',
            'telephone_1_helper'    => ' ',
            'telephone_2'           => 'Telephone 2',
            'telephone_2_helper'    => ' ',
            'email'                 => 'Email',
            'email_helper'          => ' ',
            'client'                => 'Client',
            'client_helper'         => ' ',
            'fournisseur'           => 'Fournisseur',
            'fournisseur_helper'    => ' ',
            'created_at'            => 'Créé le',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Mis à jour le',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Supprimé le',
            'deleted_at_helper'     => ' ',
            'raison_sociale'        => 'Raison Sociale',
            'raison_sociale_helper' => ' ',
            'name'                  => 'Nom',
            'name_helper'           => ' ',
            'adresse'               => 'Adresse',
            'adresse_helper'        => ' ',
            'created_by'            => 'Ajouté par',
            'created_by_helper'     => ' ',
        ],
    ],
    'categorie' => [
        'title'          => 'Catégories',
        'title_singular' => 'Catégorie',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Nom',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'color'              => 'Color',
            'color_helper'       => ' ',
            'created_at'         => 'Créé le',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Mis à jour le',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Supprimé le',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'gestionDesArticle' => [
        'title'          => 'Gestion Des Articles',
        'title_singular' => 'Gestion Des Article',
    ],
    'article' => [
        'title'          => 'Articles',
        'title_singular' => 'Article',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'reference'             => 'Réference',
            'reference_helper'      => ' ',
            'stock_actuel'          => 'Stock Actuel',
            'stock_actuel_helper'   => ' ',
            'name'                  => 'Désignation',
            'name_helper'           => ' ',
            'prix_min'              => 'Prix Min',
            'prix_min_helper'       => ' ',
            'prix_ttc'              => 'Prix Ttc',
            'prix_ttc_helper'       => ' ',
            'note'                  => 'Note',
            'note_helper'           => ' ',
            'stock_virtuel'         => 'Stock Virtuel',
            'stock_virtuel_helper'  => ' ',
            'stock_physique'        => 'Stock Physique',
            'stock_physique_helper' => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'tosell'                => 'A vendre',
            'tosell_helper'         => ' ',
            'tobuy'                 => 'A acheter',
            'tobuy_helper'          => ' ',
            'created_at'            => 'Créé le',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Mis à jour le',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Supprimé le',
            'deleted_at_helper'     => ' ',
            'categorie'             => 'Categorie',
            'categorie_helper'      => ' ',
            'prix_ht'               => 'Prix Ht',
            'prix_ht_helper'        => ' ',
            'is_active'             => 'Active',
            'is_active_helper'      => ' ',
            'tva'                   => 'Tva',
            'tva_helper'            => ' ',
            'stock_seuil'           => 'Stock Seuil',
            'stock_seuil_helper'    => ' ',
            'photo'                 => 'Photo',
            'photo_helper'          => ' ',
        ],
    ],
    'numSerie' => [
        'title'          => 'Numéro de série',
        'title_singular' => 'Numéro de série',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Nom',
            'name_helper'       => ' ',
            'article'           => 'Article',
            'article_helper'    => ' ',
            'created_at'        => 'Créé le',
            'created_at_helper' => ' ',
            'updated_at'        => 'Mis à jour le',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Supprimé le',
            'deleted_at_helper' => ' ',
            'is_active'         => 'En stock',
            'is_active_helper'  => ' ',
            'note'              => 'Note',
            'note_helper'       => ' ',
        ],
    ],
    'facture' => [
        'title'          => 'Factures',
        'title_singular' => 'Facture',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'reference'             => 'Réference',
            'reference_helper'      => ' ',
            'date_facture'          => 'Date Facture',
            'date_facture_helper'   => ' ',
            'date_reglement'        => 'Date Reglement',
            'date_reglement_helper' => ' ',
            'total_ht'              => 'Total Ht',
            'total_ht_helper'       => ' ',
            'total_ttc'             => 'Total Ttc',
            'total_ttc_helper'      => ' ',
            'note'                  => 'Note',
            'note_helper'           => ' ',
            'contact'               => 'Contact',
            'contact_helper'        => ' ',
            'created_at'            => 'Créé le',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Mis à jour le',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Supprimé le',
            'deleted_at_helper'     => ' ',
            'user'                  => 'User',
            'user_helper'           => ' ',
            'is_locked'             => 'Verouillé',
            'is_locked_helper'      => ' ',
            'etape'                 => 'Etape',
            'etape_helper'          => ' ',
        ],
    ],
    'factureDetail' => [
        'title'          => 'Details Facture',
        'title_singular' => 'Details Facture',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'article'            => 'Article',
            'article_helper'     => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'qte'                => 'Qte',
            'qte_helper'         => ' ',
            'total_ht'           => 'Total Ht',
            'total_ht_helper'    => ' ',
            'total_tva'          => 'Total Tva',
            'total_tva_helper'   => ' ',
            'total_ttc'          => 'Total Ttc',
            'total_ttc_helper'   => ' ',
            'created_at'         => 'Créé le',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Mis à jour le',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Supprimé le',
            'deleted_at_helper'  => ' ',
            'facture'            => 'Facture',
            'facture_helper'     => ' ',
            'user'               => 'User',
            'user_helper'        => ' ',
            'num_serie'          => 'Num Serie',
            'num_serie_helper'   => ' ',
            'tva'                => 'Tva',
            'tva_helper'         => ' ',
        ],
    ],
    'approvisionnement' => [
        'title'          => 'Approvisionnements',
        'title_singular' => 'Approvisionnement',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'article'            => 'Article',
            'article_helper'     => ' ',
            'num_serie'          => 'Num Serie',
            'num_serie_helper'   => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'qte'                => 'Qte',
            'qte_helper'         => ' ',
            'total_ht'           => 'Total Ht',
            'total_ht_helper'    => ' ',
            'total_tva'          => 'Total Tva',
            'total_tva_helper'   => ' ',
            'total_ttc'          => 'Total Ttc',
            'total_ttc_helper'   => ' ',
            'user'               => 'Ajouté par',
            'user_helper'        => ' ',
            'etape'              => 'Etape',
            'etape_helper'       => ' ',
            'created_at'         => 'Créé le',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Mis à jour le',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Supprimé le',
            'deleted_at_helper'  => ' ',
        ],
    ],
];