<?php

namespace App\Controller\Admin;

use App\Entity\Perceptions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PerceptionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Perceptions::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('libellePerception')->setLabel('Libellé de la perception'),
            AssociationField::new('recetteFinance')->setLabel('Recette des Finances:'),
        ];
    }
}
