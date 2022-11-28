<?php

namespace App\Controller\Admin;

use App\Entity\POSTE;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;



class POSTECrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return POSTE::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
