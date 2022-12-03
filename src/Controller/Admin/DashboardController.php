<?php

namespace App\Controller\Admin;

use App\Entity\Circonscriptions;
use App\Entity\Equipe;
use App\Entity\Perceptions;
use App\Entity\RecettesFinances;
use App\Entity\Tresoreries;
use App\Entity\Utilisateurs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        $url = $this->redirect($adminUrlGenerator->setController(UtilisateursCrudController::class)
            ->generateUrl());

        return $url;
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('DECPEC')
            ;
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        return [
            MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),

            MenuItem::section('Sécurité'),
            MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', Utilisateurs::class),

            MenuItem::section('Organisations'),
            MenuItem::linkToCrud('Equipes', 'fa fa-users', Equipe::class),
            MenuItem::linkToCrud('Circonscriptions', 'fa fa-money-bill', Circonscriptions::class),
            MenuItem::linkToCrud('Trésoreries', 'fa fa-university', Tresoreries::class),
            MenuItem::linkToCrud('Recettes', 'fa fa-bank', RecettesFinances::class),
            MenuItem::linkToCrud('Perceptions', 'fa fa-building', Perceptions::class),
        ];
    }
}
