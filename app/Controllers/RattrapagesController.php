<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\AdministrateurModel;

class RattrapagesController extends Controller
{
    public function __construct()
    {
        helper(['form', 'mail']);
    }


    /**
     * Permet d'afficher la page d'accueil
     */
    public function rattrapagesAFaire()
    {
        return view('rattrapagesAFaireVue');
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function rattrapagesProg()
    {
        return view('rattrapagesProgVue');
    }

    /**
     * Permet d'afficher la page d'accueil
     */
    public function detailsRattrapage()
    {
        return view('detailsRattrapageVue');
    }
}