<?php

namespace App\Controller\Admin;

use App\Entity\Contexte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContexteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contexte::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom')
        ];
    }
}
