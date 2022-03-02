<?php

namespace App\Controller\Admin;

use App\Entity\RDV;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RDVCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RDV::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('created_at'),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('email'),
            TelephoneField::new('telephone'),
            TextareaField::new('motif'),
        ];
    }

}
