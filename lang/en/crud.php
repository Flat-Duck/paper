<?php

return [
    'dashboard'=> 'لوحة التحكم',
    'common' => [
        'actions' => 'العمليات',
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'update' => 'حفظ التعديلات',
        'new' => 'جديد',
        'cancel' => 'إلغاء',
        'attach' => 'أضافة',
        'detach' => 'إزالة',
        'save' => 'حفظ',
        'delete' => 'حذف',
        'delete_selected' => 'حذف المحدد',
        'search' => 'بحث',
        'back' => 'رجوع إلى القائمة',
        'are_you_sure' => 'هل انت متأكد؟',
        'no_items_found' => 'لاتوجد عناصر',
        'created' => 'تم الانشاء بنجاح',
        'saved' => 'تم الحفظ بنجاح',
        'removed' => 'تم الحذف بنجاح',
    ],

    'users' => [
        'name' => 'المستخدمين',
        'index_title' => 'قائمة المستخدمين',
        'new_title' => 'مستخدم جديد',
        'create_title' => 'انشاء مستخدم',
        'edit_title' => 'تعديل مستخدم',
        'show_title' => 'عرض مستخدم',
        'inputs' => [
            'name' => 'الإسم',
            'email' => 'البريد الالكتروني',
            'phone' => 'رقم الهاتف',
            'is_teacher'=> 'عضو هيئة تدريس؟',
            'gender' => 'الجنس',
            'address' => 'العنوان',
            'password' => 'كلمة المرور',
        ],
    ],



    'departments' => [
        'name' => 'الاقسام',
        'index_title' => 'قائمة الاقسام',
        'new_title' => 'قسم جديد',
        'create_title' => 'انشاء قسم',
        'edit_title' => 'تعديل قسم',
        'show_title' => 'عرض قسم',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'sections' => [
        'name' => 'الشعبات',
        'index_title' => 'قائمة الشعبات',
        'new_title' => 'شعبة جديدة',
        'create_title' => 'انشاء شعبة',
        'edit_title' => 'تعديل شعبة',
        'show_title' => 'عرض شعبة',
        'inputs' => [
            'department_id' => 'القسم',
            'name' => 'الإسم',
        ],
    ],

    'papers' => [
        'name' => 'الاوراق العلمية',
        'index_title' => 'قائمة الاوراق العلمية',
        'new_title' => 'ورقة علمية جديدة',
        'create_title' => 'انشاء ورقة علمية',
        'edit_title' => 'تعديل ورقة علمية',
        'show_title' => 'عرض ورقة علمية',
        'inputs' => [
            'title' => 'العنوان',
            'author' => 'المؤلف',
            'published_at' => 'تاريخ النشر',
            'downloads' => 'عدد التحميلات',
            'section_id' => 'الشعبة',
            'department_id' => 'القسم',
        ],
    ],

    'books' => [
        'name' => 'الكتب',
        'index_title' => 'قائمة الكتب',
        'new_title' => 'كتاب جديد',
        'create_title' => 'انشاء كتاب',
        'edit_title' => 'تعديل كتاب',
        'show_title' => 'عرض كتاب',
        'inputs' => [
            'title' => 'العنوان',
            'author' => 'المؤلف',
            'published_at' => 'تاريخ النشر',
            'publisher' => 'دار النشر',
            'downloads' => 'عدد التحميلات',
            'department_id' => 'القسم',
            'section_id' => 'الشعبة',
        ],
    ],

    'roles' => [
        'name' => 'الادوار',
        'index_title' => 'الادوار قائمة',
        'create_title' => 'انشاء دور',
        'edit_title' => 'تعديل دور',
        'show_title' => 'عرض دور',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],

    'permissions' => [
        'name' => 'الصلاحيات',
        'index_title' => 'الصلاحيات قائمة',
        'create_title' => 'انشاء صلحية',
        'edit_title' => 'تعديل صلحية',
        'show_title' => 'عرض صلحية',
        'inputs' => [
            'name' => 'الإسم',
        ],
    ],
];