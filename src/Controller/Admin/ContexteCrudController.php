<?php

namespace App\Controller\Admin;

use App\Entity\Contexte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContexteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contexte::class;
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
